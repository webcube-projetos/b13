<?php

namespace App\Http\Controllers;

use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class AdicionaisController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;

    public function __construct()
    {
        $this->prefix = 'adicionais';
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('adicionais');
        $lista = $this->query()->paginate(10);
        $dados = $this->montarForm('adicionais');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

        $data = [];

        $data[] = [
            'adicionais' => 'Banco de couro',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];

        $data[] = [
            'adicionais' => 'GPS',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];
        $data[] = [
            'adicionais' => 'ABS',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];
        $data[] = [
            'adicionais' => 'Blindado',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];

        return new FakeModel($data);
    }

    public function select()
    {
        $faker = Faker::create('pt_BR');
        $data = [];

        for ($i = 0; $i < 4; $i++) {
            $data[] = [
                'id' => $i,
                'nome' => $faker->randomElement(['Idioma', 'Transporte executivo', 'Direção Defensiva', 'Transporte de veículos especiais']),
            ];
        }

        return $data;
    }
}
