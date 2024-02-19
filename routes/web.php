<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\MotoristasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SegurancasController;
use App\Http\Controllers\SessionsController;
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
	Route::prefix('clientes')->group(function () {
		Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
		Route::get('/listar', [ClientesController::class, 'listar'])->name('clientes.listar');
	});

	Route::prefix('empresas')->group(function () {
		Route::get('/', [EmpresasController::class, 'index'])->name('empresas.index');
		Route::get('/listar', [EmpresasController::class, 'listar'])->name('empresas.listar');
	});

	Route::prefix('veiculos')->group(function () {
		Route::get('/', [VeiculosController::class, 'index'])->name('veiculos.index');
		Route::get('/listar', [VeiculosController::class, 'listar'])->name('veiculos.listar');
	});

	Route::prefix('motoristas')->group(function () {
		Route::get('/', [MotoristasController::class, 'index'])->name('motoristas.index');
		Route::get('/listar', [MotoristasController::class, 'listar'])->name('motoristas.listar');
	});

	Route::prefix('segurancas')->group(function () {
		Route::get('/', [SegurancasController::class, 'index'])->name('segurancas.index');
		Route::get('/listar', [SegurancasController::class, 'listar'])->name('segurancas.listar');
	});

	Route::prefix('clientes')->group(function () {
		Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
		Route::get('/listar', [ClientesController::class, 'listar'])->name('clientes.listar');
		Route::get('/cadastro', [ClientesController::class, 'cadastro'])->name('clientes.cadastro');
	});


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
