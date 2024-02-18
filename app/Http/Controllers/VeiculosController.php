<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use Faker\Factory as Faker;

class VeiculosController extends Controller
{
    protected $prefix;

    use MontarPagina;

    public function __construct()
    {
        $this->prefix = 'veiculos';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('veiculos');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'tipo_veiculo' => $faker->randomElement(['SUV', 'Van', 'SEDAN']),
                'marca' => $faker->vehicleBrand,
                'modelo' => $faker->vehicleModel,
                'ano' => $faker->numberBetween(2000, 2023),
                'blindado' => $faker->boolean,
                'placa' => $faker->vehicleRegistration('[A-Z]{3}-[0-9]{4}'),
                // 'parceira' => $faker->company,
                'adicionais' => $faker->randomElement(['Ar condicionado,ABS, GPS', 'GPS, Bancos de couro'])
            ];
        }
        return new FakeModel($data);
    }
    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('veiculos');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }
}
