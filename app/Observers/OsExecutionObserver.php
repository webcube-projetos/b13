<?php

namespace App\Observers;

use App\Models\Financial;
use App\Models\FinancialEntry;
use App\Models\OsExecution;
use App\Traits\FinancialTrait;
use Carbon\Carbon;

class OsExecutionObserver
{
    use FinancialTrait;

    public function created(OsExecution $osExecution)
    {
        $this->recalculateDays($osExecution->motorista->id_os);
        $this->generateFinancialEntries($osExecution->motorista->id_os);
        $this->generateFinancialExpenses($osExecution, $osExecution->motorista->id_os);
    }

    public function updated(OsExecution $execution)
    {
        if ($execution->isDirty('date')) {
            $this->recalculateDays($execution->motorista->id_os);
        }

        //Recalcular os valores do orcamento sempre que houver uma alteração em algum campo de valor
        if ($execution->isDirty('km_exceed') || $execution->isDirty('exceed_time')) {
            $this->recalculateFinancial($execution->motorista->id_os);
            $this->recalculateFinancialExpenses($execution);
        }
    }

    public function deleted(OsExecution $osExecution)
    {
        $this->recalculateDays($osExecution->motorista->id_os);
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
            $total += $execution->exceed_time * $service->extra_price;
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
