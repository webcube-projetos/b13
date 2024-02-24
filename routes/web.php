<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EspecializacoesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\MotoristasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SegurancasController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\OrcamentosController;
use App\Http\Controllers\OrdemDeServicoController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TipoVeiculoController;
use App\Http\Controllers\VeiculosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home']);

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	//LISTAGEM
	Route::prefix('clientes')->name('clientes.')->group(function () {
		Route::get('/', [ClientesController::class, 'index'])->name('index');
		Route::get('/listar', [ClientesController::class, 'listar'])->name('listar');
		Route::get('/cadastro', [ClientesController::class, 'cadastro'])->name('cadastro');
		//O parametro id do item pra editar devera ser enviado na rota
		Route::get('/editar', [ClientesController::class, 'editar'])->name('editar');
	});

	Route::prefix('empresas')->name('empresas.')->group(function () {
		Route::get('/', [EmpresasController::class, 'index'])->name('index');
		Route::get('/listar', [EmpresasController::class, 'listar'])->name('listar');
		Route::get('/cadastro', [EmpresasController::class, 'cadastro'])->name('cadastro');
		Route::get('/editar', [EmpresasController::class, 'editar'])->name('editar');
		Route::get('/select-empresa', [EmpresasController::class, 'select'])->name('selectEmpresa');
	});

	Route::prefix('veiculos')->name('veiculos.')->group(function () {
		Route::get('/', [VeiculosController::class, 'index'])->name('index');
		Route::get('/listar', [VeiculosController::class, 'listar'])->name('listar');
		Route::get('/cadastro', [VeiculosController::class, 'cadastro'])->name('cadastro');
		Route::get('/editar', [VeiculosController::class, 'editar'])->name('editar');
	});

	Route::prefix('motoristas')->name('motoristas.')->group(function () {
		Route::get('/', [MotoristasController::class, 'index'])->name('index');
		Route::get('/listar', [MotoristasController::class, 'listar'])->name('listar');
		Route::get('/cadastro', [MotoristasController::class, 'cadastro'])->name('cadastro');
		Route::get('/editar', [MotoristasController::class, 'editar'])->name('editar');
	});

	Route::prefix('segurancas')->name('segurancas.')->group(function () {
		Route::get('/', [SegurancasController::class, 'index'])->name('index');
		Route::get('/listar', [SegurancasController::class, 'listar'])->name('listar');
		Route::get('/cadastro', [SegurancasController::class, 'cadastro'])->name('cadastro');
		Route::get('/editar', [SegurancasController::class, 'editar'])->name('editar');
	});

	Route::prefix('servicos')->name('servicos.')->group(function () {
		Route::get('/', [ServicosController::class, 'index'])->name('index');
		Route::get('/listar', [ServicosController::class, 'listar'])->name('listar');
	});

	Route::prefix('financeiro')->name('financeiro.')->group(function () {
		Route::get('/', [FinanceiroController::class, 'index'])->name('index');
		Route::get('/listar', [FinanceiroController::class, 'listar'])->name('listar');
	});

	Route::prefix('orcamentos')->name('orcamentos.')->group(function () {
		Route::get('/', [OrcamentosController::class, 'index'])->name('index');
		Route::get('/listar', [OrcamentosController::class, 'listar'])->name('listar');
	});

	Route::prefix('os')->name('os.')->group(function () {
		Route::get('/', [OrdemDeServicoController::class, 'index'])->name('index');
		Route::get('/listar', [OrdemDeServicoController::class, 'listar'])->name('listar');
	});

	Route::get('select-tipo-veiculo', [TipoVeiculoController::class, 'select'])->name('selectTipoVeiculo');
	Route::get('select-marca', [MarcaController::class, 'select'])->name('selectMarca');
	Route::get('select-modelo', [ModeloController::class, 'select'])->name('selectModelo');
	Route::get('select-categoria', [CategoriaController::class, 'select'])->name('selectCategoria');

	Route::prefix('especializacoes')->name('especializacoes.')->group(function () {
		Route::get('/', [EspecializacoesController::class, 'index'])->name('index');
		// Route::get('/listar', [EspecializacoesController::class, 'listar'])->name('listar');
		// Route::get('/cadastro', [EspecializacoesController::class, 'cadastro'])->name('cadastro');
		Route::get('/editar', [EspecializacoesController::class, 'editar'])->name('editar');
	});

	/** LINHAS COMPONENTES */
	Route::get('row-contact', function () {
		return view('components.row-contact');
	})->name('row.contact');

	Route::get('row-adicional', function () {
		return view('components.row-adicionais');
	})->name('row.adicionais');

	Route::get('row-especializacao', function () {
		return view('components.row-especializacao');
	})->name('row.especializacao');
	/** FIM LINHAS COMPONENTES */

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

	Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('auto-register', function () {
		return view('auto-register');
	})->name('auto-register');

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);

	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');
