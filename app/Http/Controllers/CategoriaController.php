<?php

namespace App\Http\Controllers;

use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class CategoriaController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;

    public function __construct()
    {
        $this->prefix = 'categorias.veiculos';
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categorias');
        $lista = $this->query()->paginate(10);
        $dados = $this->montarForm('categorias');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

        $data = [];

        $data[] = [
            'categorias' => 'Executivo',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];

        $data[] = [
            'categorias' => 'Luxo',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];
        $data[] = [
            'categorias' => 'Cargo',
            'descricao' => 'Descrição',
            'motoristas_id' => $faker->numberBetween(1, 20),
            'ascendente' => false
        ];

        return new FakeModel($data);
    }

    public function select()
    {
        $data = [
            ['id' => 1, 'nome' => 'Executivo'],
            ['id' => 2, 'nome' => 'Luxo'],
            ['id' => 3, 'nome' => 'Cargo'],
        ];

        return $data;
    }
}
