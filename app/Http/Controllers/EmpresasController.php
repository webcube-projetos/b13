<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use Faker\Factory as Faker;

class EmpresasController extends Controller
{
    protected $prefix;

    use MontarPagina;

    public function __construct()
    {
        $this->prefix = 'empresas';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('empresas');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'razao_social' => $faker->company,
                'apelido' => $faker->firstName,
                'cidade' => $faker->city . ' - ' . $faker->stateAbbr,
                'pais' => 'Brasil',
            ];
        }

        return new FakeModel($data);
    }
    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('cliente');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }
}
