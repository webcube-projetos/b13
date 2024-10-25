<?php

namespace App\Traits;

use App\Models\Financial;
use App\Models\FinancialItem;
use App\Models\OS;
use Illuminate\Support\Fluent;

trait FinancialTrait
{
    /**
     * Cria as parcelas do orcamento e calcula seus valores
     * @param $id_os
     * @return void
     */
    public function generateFinancialEntries($id_os)
    {
        $financialEntries = Financial::where('id_os', $id_os)->get();

        if (!$financialEntries->count()) {
            $this->createFinancialEntries($id_os);
        }

        $this->recalculateFinancial($id_os);
    }

    public function generateFinancialExpenses($execution, $id_os)
    {
        $financial = FinancialItem::where('id_execution', $execution->id)
            ->first();

        $company = $execution->motorista->company;

        if ($company->name == 'B13 Company') return;

        if (!$financial) {
            return FinancialItem::create([
                'id_os' => $id_os,
                'id_execution' => $execution->id,
                'id_company' => $company->name != 'Freelance' ? $company->id : null,
                'id_employee' => $execution->motorista->id_employee,
                'total' => 0,
            ]);
        }
    }

    public function recalculateFinancialExpenses($execution)
    {
        $financialItem = FinancialItem::where('id_execution', $execution->id)
            ->first();

        if (!$financialItem) {
            $financialItem = $this->generateFinancialExpenses($execution, $execution->motorista->id_os);
        }

        if ($financialItem->id_company) {
            $this->calculatePartnerExpenses($execution, $financialItem);
        }

        if ($financialItem->id_employee) {
            $this->calculateEmployeeExpenses($execution, $financialItem);
        }
    }

    public function calculateEmployeeExpenses($execution, $financialItem)
    {
        if ($execution->exceed_time > 0) {
            $financialItem->total += $execution->exceed_time * $execution->motorista->oSService->employee_extra;
        }

        $financialItem->total += $execution->motorista->oSService->employee_cost;
    }

    public function calculatePartnerExpenses($execution, $financialItem)
    {
        if ($execution->km_exceed > 0) {
            $financialItem->total += $execution->km_exceed * $execution->motorista->oSService->partner_extra_km;
        }

        if ($execution->exceed_time > 0) {
            $financialItem->total += $execution->exceed_time * $execution->motorista->oSService->partner_extra_time;
        }

        $financialItem->total += $execution->motorista->oSService->partner_cost;
    }

    /**
     * Recalcula o valor de cada parcela ainda não paga
     * @param $id_os
     */
    public function recalculateFinancial($id_os)
    {
        $financialEntries = Financial::where('id_os', $id_os)
            ->where('status', Financial::NAO_PAGO)
            ->get();

        $total = $financialEntries->sum('total');

        $totalAtualizado = OS::find($id_os)->executions->sum('total');

        if ($total != $totalAtualizado) {
            $totalForInstallment = $totalAtualizado / $financialEntries->count();

            foreach ($financialEntries as $financial) {
                $financial->total += $totalForInstallment;
                $financial->save();
            }
        }
    }

    /**
     * Cria as parcelas do orcamento e calcula seus valores baseado nas parcelas
     * @param $id_os
     * @return void
     */
    public function createFinancialEntries($id_os)
    {
        $os = OS::find($id_os);
        $paymentMethod = $os->id_payment_method;
        $total = $os->executions->sum('total');

        for ($installment = 1; $installment <= $os->installments; $installment++) {
            Financial::create([
                'id_os' => $id_os,
                'id_client' => $os->id_client,
                'installment' => $installment,
                'type_transaction' => Financial::ENTRADA,
                'total' => $total / $os->installments,
            ]);
        }
    }
}
