<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NutricionistaController;
use App\Http\Controllers\DatosAntropometricoController;

use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\DietaController;


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


Auth::routes();

// ============================= RUTAS PUBLICAS ============================ //



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contactanos',[HomeController::class,'contactanos'])->name('home.contactanos');
Route::get('/nosotros',[HomeController::class, 'nosotros'])->name('home.nosotros');
Route::post('/contactar',[HomeController::class, 'contactar'])->name('home.contactar');

Route::post('/login2',[LoginController::class,'login'])->name('login2');

// ============================= RUTAS PARA ADMINISTRADOR GLOBAL ============================ //
Route::group(['prefix' => 'admin', 'middleware'=>'admin'], function () {
Route::resource('administrador',AdminController::class);


Route::get('/mi-perfil',[AdminController::class,'miCuenta'])->name('admin.cuenta');
Route::get('/editar-perfil',[AdminController::class,'formCuenta'])->name('admin.editarCuenta');
Route::post('/editar-perfil',[AdminController::class,'updateCuenta'])->name('admin.updateCuenta');

Route::get('/login-administrador',[LoginController::class,'loginAdmin'])->name('login.administrador');


Route::get('/listado',[AdminController::class,'listar'])->name('administrador.listar');
Route::get('/',[AdminController::class,'dashboard'])->name('administrador.dashboard');

// Route::post('/guardar',[AdminController::class,'store'])->name('administracion.store');

// Route::get('/listado/pacientes',[AdminController::class,'listarPacientes'])->name('administrador.indexPaciente');
Route::post('/registrar',[RegController::class,'registrarAdmin'])->name('administrador.registrar');
Route::resource('nutricionista',NutricionistaController::class);
});


// ================================== RUTAS PARA NUTRICIONISTAS ============================ //
Route::group(['prefix' => 'nutricionista', 'middleware'=>'nutri'], function () {
    Route::get('/',[NutricionistaController::class,'dashboard'])->name('nutricionista.dashboard');
    Route::get('/mi-cuenta',[NutricionistaController::class,'miCuenta'])->name('nutricionista.cuenta');
    Route::get('/editar-perfil',[NutricionistaController::class,'formCuenta'])->name('nutricionista.editarCuenta');
    Route::post('/editar-perfil',[NutricionistaController::class,'updateCuenta'])->name('nutricionista.updateCuenta');
    
    Route::post('/login-nutricionista',[LoginController::class,'loginPaciente'])->name('login.nutricionista');
   });


// ================================= RUTAS PARA ADMINS Y NUTRICIONISTAS ===================== //
Route::group(['prefix' => 'nutricionista','middleware'=>'admin_nutri'],function () {
    Route::resource('alimento',AlimentoController::class);
    Route::resource('paciente',PacienteController::class);
    Route::resource('dieta',DietaController::class);
    Route::resource('datosantropometrico',DatosAntropometricoController::class);
    Route::get('/datos-antropometricos/agregar/{paciente_id}',[DatosAntropometricoController::class,'agregarDatosAntropometricos'])->name('admin.agregarDatosAntropometricos');
    Route::get('/dieta/eliminar/{id}',[DietaController::class,'eliminarDieta'])->name('dieta.eliminarDieta');
    
    Route::get('/paciente/eliminar/{id}',[PacienteController::class,'eliminarPaciente'])->name('paciente.eliminar');
    Route::get('/paciente/datos-antropometricos',[PacienteController::class,'datosAntropometricos'])->name('paciente.datosAntropometricos');
    Route::post('/paciente/datos-antropometricos',[PacienteController::class,'guardarDatosAntropometricos'])->name('paciente.guardarDatosAntropometricos');
    Route::post('/paciente/actualizar',[PacienteController::class,'actualizarPaciente'])->name('paciente.actualizar');

});



// ============================= RUTAS PARA CLIENTES ============================ //
Route::group(['middleware'=>'paciente'], function () {
    Route::get('/perfil',[ClienteController::class,'dashboard'])->name('cliente.dashboard');
    Route::get('/mi-cuenta',[ClienteController::class,'miCuenta'])->name('cliente.cuenta');
    Route::get('/editar-perfil',[ClienteController::class,'formCuenta'])->name('cliente.editarCuenta');
    Route::post('/editar-perfil',[ClienteController::class,'updateCuenta'])->name('cliente.updateCuenta');
   

    Route::post('/login-paciente',[LoginController::class,'loginPaciente'])->name('login.paciente');
   });



