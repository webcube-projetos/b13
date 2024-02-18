<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class MotoristasController extends Controller
{
    protected $prefix;

    use MontarPagina;

    public function __construct()
    {
        $this->prefix = 'motoristas';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('motoristas');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'pessoa-foto' => [
                    'nome' => $faker->firstName . ' ' . $faker->lastName,
                    'foto' => $faker->imageUrl($width = 640, $height = 480, 'people'),
                ],
                'empresa' => $faker->company,
                'cidade' => $faker->city . ' - ' . $faker->stateAbbr,
                'status' => $faker->boolean,
            ];
        }

        return new FakeModel($data);
    }

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('motoristas');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }
}
