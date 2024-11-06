<?php

namespace App\Livewire\OS;

use App\Models\Financial;
use App\Models\OS;
use Livewire\Attributes\On;
use Livewire\Component;

class Financeiro extends Component
{
    public $id;
    public $entries;
    public $expenses;

    public $paymentMethod;
    public $paymentOptions;
    public $payed = false;
    public $itens = [];
    public $targetClass = Financeiro::class;

    public function mount($id = null)
    {
        $this->id = $id;

        $this->id = $id;

        if ($this->id) {
            $orcamento  = OS::find($this->id);

            $this->paymentMethod = $orcamento->id_payment_method;
            $this->paymentOptions = $orcamento->id_payment_options;
            $fincancialEntries = $orcamento->financialEntries->where('status', Financial::PAGO);

            if ($fincancialEntries->count()) {
                $this->payed = true;
            }
        }

        $this->entries = $this->entries();

        $this->expenses = $this->expenses();
    }

    public function updateDate($value, $idFinancial)
    {
        $financial = Financial::find($idFinancial);

        if ($value) {
            $financial->date = $value;
            $financial->status = Financial::PAGO;
            $this->payed = true;

            $financial->save();

            if ($financial->type == 'Entrada') {
                $this->dispatch('payed');
                $this->entries = $this->entries();
            } else {
                $this->expenses = $this->expenses();
            }
        } else {
            $financial->status = Financial::NAO_PAGO;
            $financial->save();
        }
    }


    public function entries()
    {
        return Financial::where('id_os', $this->id)
            ->where('type_transaction', Financial::ENTRADA)
            ->get();
    }

    public function expenses()
    {
        return Financial::where('id_os', $this->id)
            ->where('type_transaction', Financial::SAIDA)
            ->get();
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (!in_array($type, ['paymentMethod', 'paymentOptions'])) {
            return;
        }

        $this->{$type} = $value;
        $this->updateOS($type);
    }

    public function updateOS($property)
    {
        $Os = OS::find($this->id);
        if ($property == 'paymentMethod') {
            $Os->id_payment_method = $this->paymentMethod;
            $Os->save();
            $this->entries = $this->entries();
        }

        if ($property == 'paymentOptions') {
            $Os->id_payment_options = $this->paymentOptions;
            $Os->save();
        }
    }

    public function verDetalhes($id)
    {
        $financial = Financial::find($id);

        $itens = match (true) {
            $financial->id_company !== null => $financial->companyExpenses,
            $financial->id_employee !== null => $financial->employeeExpenses,
        };

        $this->itens = $itens;
    }

    #[On('refresh-finance')]
    public function refresh()
    {
        $this->entries = $this->entries();
        $this->expenses = $this->expenses();
    }

    public function render()
    {
        return view('livewire.o-s.financeiro');
    }
}
