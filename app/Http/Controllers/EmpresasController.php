<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\BankAccount;
use App\Models\Company;
use App\Models\CompanyContact;
use App\Models\Contact;
use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'empresas';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('empresas', 'prefix');

        return view('pages.Companies.index', compact('prefix', 'dados', 'config', 'header'));
    }


    public function listar()
    {
        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('empresas');

        return view('pages.Companies.list', compact('dados', 'config', 'header'));
    }

    public function search()
    {
        return Company::query()
            ->with(['address', 'contacts']);
    }


    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('empresas');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $prefix = $this->prefix;
        $id = request()->query('company');

        $company = Company::find($id);

        $dados = $this->montarForm('empresas', $company);

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function salvar()
    {
        DB::beginTransaction();

        $company = $this->request->id ? Company::find($this->request->id) : new Company();

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

            $company->id_bank = $bank->id;
            $company->save();
            DB::commit();

            return [
                'route' => route('empresas.editar', ['company' => $company->id]),
            ];
        }

        $endereco = Address::updateOrCreate(
            [
                'id' => $company?->id_address ?? null
            ],
            [
                'cep' => $this->request->cep,
                'street' => $this->request->logradouro,
                'number' => $this->request->numero,
                'complement' => $this->request->complement,
                'neighborhood' => $this->request->bairro,
                'city' => $this->request->cidade,
                'state' => $this->request->estado,
                'country' => $this->request->pais,
            ]
        );

        $company->fill([
            'id_address' => $endereco->id,
            'document' => preg_replace('/[^0-9]/', '', $this->request->cpfcnpj),
            'name' => $this->request->razao,
            'fantasy_name' => $this->request->nome_fantasia,
            'nickname' => $this->request->apelido,
            'phone' => $this->request->phone,
            'email' => $this->request->email,
        ]);
        $company->save();

        // Processar contatos
        $existingContactIds = $company->contacts->pluck('id')->toArray();
        $requestContactIds = $this->request->id_contato ?? [];

        // Atualizar ou criar contatos
        if ($this->request->nome_contato) {
            foreach ($this->request->nome_contato as $index => $contato) {
                $contact = Contact::updateOrCreate(
                    [
                        'id' => $this->request->id_contato[$index] ?? null
                    ],
                    [
                        'name' => $contato,
                        'email' => $this->request->email_contato[$index],
                        'phone' => $this->request->telefone_contato[$index],
                        'document' => $this->request->cpf_contato[$index],
                        'whatsapp' => $this->request->whatsapp_contato[$index],
                        'role' => $this->request->cargo_contato[$index],
                    ]
                );

                if (!$this->request->id_contato[$index]) {
                    CompanyContact::create([
                        'company_id' => $company->id,
                        'contact_id' => $contact->id,
                    ]);
                }

                // Remover do array de IDs existentes para que não seja deletado
                if (($key = array_search($contact->id, $existingContactIds)) !== false) {
                    unset($existingContactIds[$key]);
                }
            }
        }

        // Remover contatos que não estão mais presentes na solicitação
        if (!empty($existingContactIds)) {
            CompanyContact::whereIn('contact_id', $existingContactIds)->delete();
            Contact::destroy($existingContactIds);
        }
        
        DB::commit();

        return [
            'route' => route('empresas.editar', ['company' => $company->id]),
        ];
    }
}
