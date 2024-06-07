<?php

namespace App\Http\Controllers;

use App\Models\ActiveSpecialization;
use App\Models\Address;
use App\Models\BankAccount;
use App\Models\Employee;
use App\Models\Specialization;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MotoristasController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'motoristas';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('motoristas');

        return view('pages.Employees.index', compact('prefix', 'dados', 'config', 'header'));
    }

    public function search()
    {
        return Employee::query()
            ->where('type', 1)
            ->with(['address', 'contacts', 'specializations']);
    }

    public function listar()
    {
        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('motoristas');

        return view('pages.Employees.list', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('motoristas');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $prefix = $this->prefix;
        $id = request()->query('employee');

        $employee = Employee::find($id);
        $dados = $this->montarForm('motoristas', $employee);

        return view('cadastro', compact('dados', 'prefix', 'employee'));
    }

    public function salvar()
    {
        DB::beginTransaction();

        $imgUrlFoto = null;
        $imgUrlCnh = null;

        $employee = null; // Inicialize $employee fora dos condicionais para garantir que esteja disponível fora deles

        if ($this->request->id) {
            $employee = Employee::find($this->request->id);
        }

        if ($this->request->photo) {
            $photo = json_decode($this->request->photo);
            $imgUrlFoto = $this->storeImageBase64($photo->data, 'segurancas');
        } elseif ($employee && $employee->photo) { // Verifica se $employee existe e se possui uma foto existente
            $imgUrlFoto = $employee->photo; // Mantém a foto existente
        }

        if ($this->request->cnh) {
            $cnh = json_decode($this->request->cnh);
            $imgUrlCnh = $this->storeImageBase64($cnh->data, 'segurancas');
        } elseif ($employee && $employee->cnh) { // Verifica se $employee existe e se possui uma CNH existente
            $imgUrlCnh = $employee->cnh; // Mantém a CNH existente
        }

        if ($this->request->tipo == 'bank') {
            $bank = BankAccount::updateOrCreate(
                [
                    'id' => $this->request->id_bank ?? null
                ],
                [
                    'bank' => $this->request->nome_banco ?? null,
                    'bank_number' => $this->request->numero_banco ?? null,
                    'agency' => $this->request->agencia ?? null,
                    'cc' => $this->request->conta ?? null,
                    'key_type' => $this->request->tipo_chave ?? null,
                    'key' => $this->request->chave_pix ?? null,
                    'preference' => $this->request->preference ?? null,
                ]
            );
        
            $employee->id_bank = $bank->id;
            $employee->save();
            DB::commit();
        
            return [
                'route' => route('motoristas.editar', ['employee' => $employee->id]),
            ];
        }

        // Atualiza o endereço
        $endereco = Address::updateOrCreate(
            ['id' => $employee?->id_address ?? null],
            [
                'cep' => $this->request->cep,
                'street' => $this->request->street,
                'number' => $this->request->number,
                'complement' => $this->request->complement,
                'neighborhood' => $this->request->neighborhood,
                'city' => $this->request->city,
                'state' => $this->request->state,
                'country' => $this->request->country,
            ]
        );

        // Atualiza os dados do funcionário
        $employee = Employee::updateOrCreate(
            ['id' => $this->request->id],
            [
                'type' => Employee::DRIVER,
                'name' => $this->request->name,
                'fantasy_name' => $this->request->fantasy_name ?? null,
                'nickname' => $this->request->nickname ?? null,
                'document' => preg_replace('/[^0-9]/', '', $this->request->document),
                'armed' => 0,
                'driver' => 0,
                'phone' => $this->request->phone,
                'email' => $this->request->email,
                'id_address' => $endereco->id,
                'id_company' => $this->request->id_company ?? null,
                'id_bank' => null,
                'obs' => $this->request->obs ?? null,
                'cnh' => $imgUrlCnh ?? $employee->cnh, // Manter a CNH existente se não houver nova selecionada
                'photo' => $imgUrlFoto ?? $employee->photo, // Manter a foto existente se não houver nova selecionada
            ]
        );

        // Verifica se há especializações selecionadas antes de tentar atualizá-las
        if (!empty($this->request->id_especialization)) {
            foreach ($this->request->id_especialization as $index => $especializacao) {
                $especializacao = Specialization::find($especializacao);

                if (!$especializacao) continue;
                if (!$especializacao->children->isEmpty()) continue;

                ActiveSpecialization::updateOrCreate([
                    'id_employee' => $employee->id,
                    'id_especializacao' => $especializacao->id,
                ]);
            }
        }

        DB::commit();

        return [
            'route' => route('motoristas.editar', ['employee' => $employee->id]),
        ];
    }
}
