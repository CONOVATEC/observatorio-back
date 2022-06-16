<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\admin\NewController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ConfigCompanyController;

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

Route::group(['middleware' => 'auth:sanctum', 'verified'],function(){

Route::get('/', [StaterkitController::class, 'home'])->name('home');
// Route::get('home', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [DashboardController::class, 'dashboard'])->name('dashboard');
// Route::get('/noticias/test', [NewController::class,'test'])->name('noticias-test');
Route::get('/configuracion/empresa', [ConfigCompanyController::class,'settingCompany'])->name('configuracion.empresa');
Route::get('/usuarios', [UserController::class,'index'])->name('usuarios.index');
Route::get('/usuarios/perfil', [UserController::class,'profile'])->name('usuarios.perfil');
Route::resource('noticias', NewController::class)->names('noticias');
//oute::resource('etiquetas', TagController::class)->names('etiquetas');
// para restaurar categoría
Route::get('categorias/eliminar-definitivo/{id}', [CategoryController::class, 'deleteDefinitive'])->name('categorias.eliminar.definitivo');
Route::get('categorias/restaurar/{id}', [CategoryController::class, 'restore'])->name('categorias.restaurar');
Route::resource('categorias', CategoryController::class)->names('categorias');




// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

    Route::get('/', [StaterkitController::class, 'home'])->name('home');
    // Route::get('home', [StaterkitController::class, 'home'])->name('home');
    // Route::get('home', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Route::get('/noticias/test', [NewController::class,'test'])->name('noticias-test');
    Route::get('/configuracion/empresa', [ConfigCompanyController::class, 'settingCompany'])->name('configuracion.empresa');
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/perfil', [UserController::class, 'profile'])->name('usuarios.perfil');
    Route::resource('noticias', NewController::class)->names('noticias');
   
    // para restaurar categoría
    Route::get('categorias/eliminar-definitivo/{id}', [CategoryController::class, 'deleteDefinitive'])->name('categorias.eliminar.definitivo');
    Route::get('categorias/restaurar/{id}', [CategoryController::class, 'restore'])->name('categorias.restaurar');
    Route::resource('categorias', CategoryController::class)->names('categorias');
  
  // para restaurar etiquetas
Route::get('etiquetas/eliminar-definitivo/{id}', [TagController::class, 'deleteDefinitive'])->name('etiquetas.eliminar.definitivo');
Route::get('etiquetas/restaurar/{id}', [TagController::class, 'restore'])->name('etiquetas.restaurar');
Route::resource('etiquetas', TagController::class)->names('etiquetas');
    // Route Components
    Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
    Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
    Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
    Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
    Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');

});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//?Rutas para limpiar el caché
//Clear route cache
Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return 'Caché de rutas borrado';
});

//Clear config cache
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Caché de configuración borrado';
});

// Clear application cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Caché de la aplicación borrado';
});

// Clear view cache
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    return 'Caché vistas borrado';
});

// Clear cache using reoptimized class
Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    return 'Caché borrado';
});

