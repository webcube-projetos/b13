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
        $financialEntries = Financial::where('id_os', $id_os)
            ->where('type_transaction', Financial::ENTRADA)
            ->get();

        if (!$financialEntries->count()) {
            $this->createFinancialEntries($id_os);
        }

        $this->recalculateFinancial($id_os);
    }

    /**
     * Cria as saidas no financeiro e calcula seus valores
     * @param $id_os
     * @param OsExecution $execution
     * @return void
     */
    public function generateFinancialExpenses($id_os, $execution)
    {
        $company = $execution->motorista->company;

        $financialExpense = Financial::where('id_os', $id_os)
            ->when($company?->name == 'Freelance' || !$company, function ($query) use ($execution) {
                $query->where('id_employee', $execution->motorista->id_employee);
            })
            ->when(!in_array($company?->name, ['Freelance', 'B13 COMPANY LTDA']), function ($query) use ($execution) {
                $query->where('id_company', $execution->motorista->id_company);
            })
            ->where('type_transaction', Financial::SAIDA)
            ->first();

        if (!$financialExpense) {
            $financialExpense = $this->createFinancialExpense($id_os, $execution);
        }

        $this->recalculateFinancialExpenses($execution);
    }

    /**
     * Cria uma entrada no financeiro para despesa direcionada ao motorista ou empresa
     * @param $id_os
     * @return void
     */
    public function createFinancialExpense($id_os, $execution)
    {
        $company = $execution->motorista->company;

        if ($company && $company?->name == 'B13 COMPANY LTDA') return;

        return Financial::create([
            'id_os' => $id_os,
            'installment' => 1,
            'id_company' => $company && $company?->name != 'Freelance' ? $company->id : null,
            'id_employee' => ($company?->name == 'Freelance' || !$company) ? $execution->motorista->id_employee : null,
            'type_transaction' => Financial::SAIDA,
            'total' => 0,
        ]);
    }

    /**
     * Cria os itens de despesas por execução
     * @param OsExecution $execution
     * @param $id_os
     * @return void
     */
    public function generateFinancialItensExpenses($execution, $id_os)
    {
        $financial = FinancialItem::where('id_execution', $execution->id)
            ->first();

        $company = $execution->motorista->company;

        if ($company && $company->name == 'B13 COMPANY LTDA') return;

        if (!$financial) {
            return FinancialItem::create([
                'id_os' => $id_os,
                'id_execution' => $execution->id,
                'id_company' => $company && $company?->name != 'Freelance' ? $company->id : null,
                'id_employee' => ($company?->name == 'Freelance' || !$company) ? $execution->motorista->id_employee : null,
                'total' => 0,
            ]);
        }
    }

    /**
     * Recalcula o valor das despesas no financeiro quando um motorista ou empresa foram contratadas para o serviço
     * @param OsExecution $execution
     * @return void
     */
    public function recalculateFinancialExpenses($execution)
    {
        $company = $execution->motorista->company;

        $financialExpense = Financial::where('id_os', $execution->id_os)
            ->when($company?->name == 'Freelance' || !$company, function ($query) use ($execution) {
                $query->where('id_employee', $execution->motorista->id_employee);
            })
            ->when(!in_array($company && $company->name, ['Freelance', 'B13 COMPANY LTDA']), function ($query) use ($execution) {
                $query->where('id_company', $execution->motorista->id_company);
            })
            ->where('type_transaction', Financial::SAIDA)
            ->where('status', Financial::NAO_PAGO)
            ->first();

        if (!$financialExpense) {
            $financialExpense = $this->createFinancialExpense($execution->id_os, $execution);
        }

        if ($financialExpense->id_company) $financialExpense->total = $financialExpense->companyExpenses->sum('total');
        if ($financialExpense->id_employee) $financialExpense->total = $financialExpense->employeeExpenses->sum('total');

        $financialExpense->save();
    }

    /**
     * Recalcula o valor das despesas item a item geradas quando um motorista ou empresa foram contratadas para o serviço
     * @param OsExecution $execution
     * @return void
     */
    public function recalculateFinancialItensExpenses($execution)
    {
        $financialItem = FinancialItem::where('id_execution', $execution->id)
            ->first();

        if (!$financialItem) {
            $financialItem = $this->generateFinancialItensExpenses($execution, $execution->motorista->id_os);
        }

        if ($financialItem->id_company) {
            $this->calculatePartnerExpenses($execution, $financialItem);
        }

        if ($financialItem->id_employee) {
            $this->calculateEmployeeExpenses($execution, $financialItem);
        }
    }

    /**
     * Calcula o valor de despesas que serão pagas para o motorista contratado
     * @param OsExecution $execution
     * @param FinancialItem $financialItem
     * @return void
     */
    public function calculateEmployeeExpenses($execution, $financialItem)
    {
        $financialItem->total = $execution->motorista->oSService->employee_cost;

        if ($execution->exceed_time > 0) {
            $financialItem->total += ($execution->exceed_time / 60) * $execution->motorista->oSService->employee_extra;
        }

        $financialItem->save();
    }

    /**
     * Calcula o valor de despesas que serão pagas para o parceiro
     * @param OsExecution $execution
     * @param FinancialItem $financialItem
     * @return void
     */
    public function calculatePartnerExpenses($execution, $financialItem)
    {
        $financialItem->total = $execution->motorista->oSService->partner_cost;

        if ($execution->km_exceed > 0) {
            $financialItem->total += $execution->km_exceed * $execution->motorista->oSService->partner_extra_km;
        }

        if ($execution->exceed_time > 0) {
            $financialItem->total += $execution->exceed_time * $execution->motorista->oSService->partner_extra_time;
        }


        $financialItem->save();
    }

    /**
     * Recalcula o valor de cada parcela ainda não paga
     * @param $id_os
     */
    public function recalculateFinancial($id_os)
    {
        $financialEntries = Financial::where('id_os', $id_os)
            ->where('type_transaction', Financial::ENTRADA)
            ->get();

        $total = $financialEntries->sum('total');

        $totalAtualizado = OS::find($id_os)->executions?->sum('total') ?? 0;

        if ($total != $totalAtualizado) {
            $finanancialEntriesNotPayed = $financialEntries->where('status', Financial::NAO_PAGO);
            $totalForInstallment = ($totalAtualizado - $financialEntries->where('status', Financial::PAGO)->sum('total')) / $finanancialEntriesNotPayed->count();

            foreach ($finanancialEntriesNotPayed as $financial) {
                $financial->total = $totalForInstallment;
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

    public function convertPrice($price)
    {
        if (is_string($price)) {
            if (strpos($price, '.')) {
                $price = str_replace('.', '', $price);
            }
            return (int)$price * 100;
        }

        return $price;
    }
}
