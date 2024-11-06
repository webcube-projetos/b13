<?php

namespace App\Observers;

use App\Models\Financial;
use App\Models\FinancialEntry;
use App\Models\FinancialItem;
use App\Models\OsExecution;
use App\Traits\FinancialTrait;
use Carbon\Carbon;

class OsExecutionObserver
{
    //Toda logica aqui presente pode se tornar lenta num sistema saas multitenant,
    //Nesse caso a melhor abordagem seria transformar a logica aqui em triggers e procedures para melhorar o desempenho
    //Assim todo processamento seria feito pelo banco de dados

    use FinancialTrait;
    public function created(OsExecution $execution)
    {
        $this->calculatedTotal($execution);

        $this->recalculateDays($execution->id_os);
        $this->generateFinancialEntries($execution->id_os);
        $this->recalculateFinancialItensExpenses($execution);
        $this->generateFinancialExpenses($execution->id_os, $execution);
    }

    public function updated(OsExecution $execution)
    {
        if ($execution->isDirty('date')) {
            $this->recalculateDays($execution->id_os);
        }

        //Recalcular os valores do orcamento sempre que houver uma alteração em algum campo de valor
        if ($execution->isDirty('km_exceed') || $execution->isDirty('exceed_time') || $execution->isDirty('total')) {
            $this->recalculateFinancial($execution->id_os);
            $this->recalculateFinancialItensExpenses($execution);
            $this->recalculateFinancialExpenses($execution);
        }
    }

    public function deleting(OsExecution $execution)
    {
        $this->recalculateDays($execution->motorista->id_os);
        $execution->expense?->delete();

        $company = $execution->motorista->company;

        $financial = Financial::where('id_os', $execution->motorista->id_os)
            ->when($company?->name == 'Freelance' || !$company, function ($query) use ($execution) {
                $query->where('id_employee', $execution->motorista->id_employee);
            })
            ->when(!in_array($company && $company->name, ['Freelance', 'B13 COMPANY LTDA']), function ($query) use ($execution) {
                $query->where('id_company', $execution->motorista->id_company);
            })
            ->where('type_transaction', Financial::SAIDA)
            ->first();

        $itensFinancial = FinancialItem::where('id_os', $execution->motorista->id_os)
            ->when($company?->name == 'Freelance' || !$company, function ($query) use ($execution) {
                $query->where('id_employee', $execution->motorista->id_employee);
            })
            ->when(!in_array($company && $company?->name, ['Freelance', 'B13 COMPANY LTDA']), function ($query) use ($execution) {
                $query->where('id_company', $execution->motorista->id_company);
            })
            ->get();

        if (!$itensFinancial->count()) {
            $financial?->delete();
        }

        $this->recalculateFinancial($execution->motorista->id_os);
        $this->recalculateFinancialExpenses($execution);
    }

    private function recalculateDays($idOs)
    {
        // Buscar execuções ordenadas pela data e relacionadas à OS
        $executions = OsExecution::whereRelation('motorista', 'id_os', $idOs)
            ->orderBy('date')
            ->get();

        $currentDay = 0;
        $previousDate = null;

        foreach ($executions as $execution) {
            if ($execution->date !== $previousDate) {
                $previousDate = $execution->date;
                $currentDay++;
            }

            if ($execution->day !== $currentDay) {
                $execution->day = $currentDay;
                $execution->save();
            }
        }
    }

    public function calculatedTotal(OsExecution $execution)
    {
        $service = $execution->motorista->oSService;

        $total = $service->price;

        if ($execution->exceed_time > 0) {
            $total += ($execution->exceed_time / 60) * $service->extra_price;
        }

        if ($execution->km_exceed > 0) {
            $total += $execution->km_exceed * $service->km_extra;
        }

        if ($execution->toll > 0) {
            $total += $execution->toll;
        }

        if ($execution->parking > 0) {
            $total += $execution->parking;
        }

        if ($execution->another_expenses > 0) {
            $total += $execution->another_expenses;
        }

        $execution->total = $total;
    }


    public function saving(OsExecution $execution)
    {
        if ($execution->start_time && $execution->end_time) {
            $startTime = Carbon::parse($execution->start_time);
            $endTime = Carbon::parse($execution->end_time);

            if ($endTime->lt($startTime)) {
                $endTime->addDay();
            }

            $execution->total_time = $startTime->diffInMinutes($endTime);

            $horasRestantes = $execution->motorista->OsService->time * 60 - $execution->total_time;
            $execution->exceed_time = max(0, -$horasRestantes);
        }

        if ($execution->km_start && $execution->km_end) {
            $execution->km_total = abs($execution->km_end - $execution->km_start);

            $KMRestantes = $execution->motorista->OsService->km - $execution->km_total;
            $execution->km_exceed = $KMRestantes > 0 ? 0 : $KMRestantes * -1;
        }

        $this->calculatedTotal($execution);
    }
}
