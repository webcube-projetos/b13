<?php

namespace App\Livewire;

use App\Models\OS;
use App\Traits\MontarForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class OrcamentoCadastro extends Component
{
    public $prefix = 'orcamento';
    public $dados;
    public $selectedPrimary;
    public $contato;
    public $paymentMethod;
    public $paymentOptions;
    public $obs;
    public $client;
    public $os = null;
    public $custosEmployees = [];
    public $custosParceiro = [];
    public $custoTotalEmployee = [];
    public $custoTotalParceiro = [];
    public $id;
    public $total = null;
    public $targetClass = OrcamentoCadastro::class;

    use MontarForm;

    protected $listeners = [
        'saveOS' => 'handleSaveOS',
        'custosUpdated' => 'handleCustosUpdated',
        'totalUpdated' => 'handleUpdateTotal',
    ];

    public function mount($dados, $id = null)
    {
        $this->dados = $dados;
        $this->id = $id;

        if ($this->id) {
            $orcamento = OS::find($this->id);

            // Carregar os dados do orçamento
            $this->client = $orcamento->id_client;
            $this->contato = $orcamento->id_contact;
            $this->paymentMethod = $orcamento->id_payment_method;
            $this->paymentOptions = $orcamento->id_payment_options;
            $this->obs = $orcamento->obs;

            // Calcular o total inicial
            $this->total = $orcamento->services->sum(function ($service) {
                // Calcula o preço base do serviço
                $serviceTotal = ($service->price * $service->qtd_days * $service->qtd_service);

                return $serviceTotal;
            });
        }
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (!in_array($type, ['contato', 'paymentMethod', 'client', 'paymentOptions'])) {
            return;
        }

        $this->{$type} = $value;
    }

    public function handleCustosUpdated($serviceId, $data)
    {
        // Calculate costs for this specific line
        $custoEmployeesLinha = $data['parceiro'] ? 0 : floatval($data['custoEmployee']) * $data['qtdDias'] * $data['qtdServices'];
        $custoParceiroLinha = $data['parceiro'] ? floatval($data['custoParceiro']) * $data['qtdDias'] * $data['qtdServices'] : 0;

        // Store the costs per line in the arrays
        $this->custosEmployees[$serviceId] = $custoEmployeesLinha;
        $this->custosParceiro[$serviceId] = $custoParceiroLinha;

        // Dispatch event with the updated costs per line (no need to calculate totals here)
        $this->dispatch('updateFormCustos', [
            'custosEmployees' => $this->custosEmployees,
            'custosParceiro' => $this->custosParceiro,
        ]);

        $this->dispatch('refreshComponent');
    }

    public function handleSaveOS()
    {
        $this->validate([
            'client' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $os = OS::create([
                'id_contact' => $this->contato,
                'id_client' => $this->client,
                'id_payment_method' => $this->paymentMethod,
                'id_payment_options' => $this->paymentOptions,
                'status' => 0,
                'obs' => $this->obs,
            ]);

            $this->os = $os;
            $this->dispatch('osCreated', $os->id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function editOS()
    {
        try {
            DB::beginTransaction();
            $os = OS::updateOrCreate(
                ['id' => $this->id],
                [
                    'id_contact' => $this->contato,
                    'id_client' => $this->client,
                    'id_payment_method' => $this->paymentMethod,
                    'id_payment_options' => $this->paymentOptions,
                    'status' => 0,
                    'obs' => $this->obs,
                ]
            );

            $this->os = $os;
            $this->dispatch('osUpdated', $os->id);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function sendOrcamento()
    {
        dd($this->id);
    }

    public function converterParaOS()
    {
        // Assumindo que você tem um modelo chamado OS
        $os = OS::find($this->id);

        if ($os) {
            $os->status = 1;
            $os->save();

            // Adicione aqui qualquer notificação ou redirecionamento que desejar
            session()->flash('success', 'Orçamento convertido para OS com sucesso!');

            return redirect()->route('os.editar', ['id' => $os->id]);
        } else {
            // Lidar com o caso em que o OS não foi encontrado
            session()->flash('error', 'Erro ao converter para OS.');
        }
    }

    public function handleUpdateTotal($serviceId, $totalUpdated)
    {
        $this->total = $totalUpdated;
        $this->dispatch('refreshComponent');
    }

    public function render()
    {
        return view('livewire.orcamento-cadastro');
    }
}
