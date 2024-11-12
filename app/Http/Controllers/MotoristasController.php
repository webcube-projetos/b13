<?php

namespace App\Http\Controllers;

use App\Models\ActiveSpecialization;
use App\Models\Address;
use App\Models\BankAccount;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Specialization;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        $employee = null;

        if ($this->request->id) {
            $employee = Employee::find($this->request->id);
        }

        if ($this->request->photo) {
            $photo = json_decode($this->request->photo);
            $imgUrlFoto = $this->storeImageBase64($photo->data, 'segurancas');
        } elseif ($employee && $employee->photo) {
            $imgUrlFoto = $employee->photo;
        }

        if ($this->request->cnh) {
            $cnh = json_decode($this->request->cnh);
            $imgUrlCnh = $this->storeImageBase64($cnh->data, 'segurancas');
        } elseif ($employee && $employee->cnh) {
            $imgUrlCnh = $employee->cnh;
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
                'document' => preg_replace('/[^0-9]/', '', $this->request->document),
                'armed' => $this->request->armed ?? 0,
                'id_address' => $endereco->id,
                'id_company' => $this->request->id_company ?? null,
                'fantasy_name' => $this->request->fantasy_name ?? $employee->fantasy_name ?? null,
                'nickname' => $this->request->nickname ?? $employee->nickname ?? null,
                'phone' => $this->request->phone ?? $employee->phone ?? null,
                'email' => $this->request->email ?? $employee->email ?? null,
                'id_bank' => $employee->id_bank ?? null,
                'obs' => $this->request->obs ?? $employee->obs ?? null,
                'cnh' => $imgUrlCnh ?? $employee->cnh ?? null,
                'photo' => $imgUrlFoto ?? $employee->photo ?? null,
                'status' => $this->request->status ? 1 : 0,
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

    public function delete()
    {
        $employee = Employee::find($this->request->id);

        if (!$employee) {
            return redirect()->back()->with('error', 'Motorista não encontrado.');
        }

        DB::beginTransaction();

        try {
            // Excluir a conta bancária associada ao motorista
            if ($employee->bank) {
                $employee->bank->delete();
            }

            // Excluir os contatos associados ao motorista
            foreach ($employee->contacts as $contact) {
                // Excluir o contato diretamente
                $contact->delete();
            }

            // Excluir as especializações ativas associadas ao motorista
            ActiveSpecialization::where('id_employee', $employee->id)->delete();

            // Excluir o motorista
            $employee->delete();

            DB::commit();

            return redirect()->route('motoristas.index')->with('success', 'Motorista excluído com sucesso.');

        } catch (\Exception $e) {
            DB::rollback();
            // Lidar com erros, logar ou notificar
            Log::error('Erro ao excluir motorista: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao excluir motorista: ' . $e->getMessage());
        }
    }
}
