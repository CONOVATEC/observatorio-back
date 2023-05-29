<?php

use App\Http\Controllers\admin\About_cmpjController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DirectiveController;
use App\Http\Controllers\admin\GradeController;
use App\Http\Controllers\admin\LogoController;
use App\Http\Controllers\admin\PositionController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\ThematicController;
use App\Http\Controllers\admin\TypeLogoController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\YouthObservatoryController;
use App\Http\Controllers\admin\YouthPolicyController;
use App\Http\Controllers\admin\YouthStrategyController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Artisan;
//use App\Http\Controllers\Api\V1\YoutObservatoryController;
//use App\Http\Controllers\admin\Youth_observatoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

    //*Route aboutsObservatory

    //Route::resource('juvenilesObservatorio', Youth_observatoryController::class)->names('juvenilesObservatorio');
    Route::resource('sobreCmpj', About_cmpjController::class)->names('sobreCmpj');

    //*Rutas para dashboard
    Route::get('/home', [DashboardController::class, 'dashboard'])->middleware('can:dashboard')->name('dashboard');

    //*Rutas para Noticias  posts
    Route::resource('noticias', PostController::class)->names('noticias');
    Route::get('noticias/eliminar-definitivo/{id}', [PostController::class, 'deleteDefinitive'])->name('noticias.eliminar.definitivo');
    Route::get('noticias/restaurar/{id}', [PostController::class, 'restore'])->name('noticias.restaurar');

    //* Rutas para usuarios
    Route::get('usuarios/actualizar-perfil', [UserController::class, 'updateProfile'])->name('usuarios.actualizar.perfil');
    Route::get('usuarios/eliminar-definitivo/{id}', [UserController::class, 'deleteDefinitive'])->name('usuarios.eliminar.definitivo');
    Route::get('usuarios/restaurar/{id}', [UserController::class, 'restore'])->name('usuarios.restaurar');
    Route::resource('usuarios', UserController::class)->names('usuarios');

    //* para restaurar categoría
    Route::get('categorias/eliminar-definitivo/{id}', [CategoryController::class, 'deleteDefinitive'])->middleware('can:categorias.eliminar.definitivo')->name('categorias.eliminar.definitivo');
    Route::get('categorias/restaurar/{id}', [CategoryController::class, 'restore'])->middleware('can:categorias.restaurar')->name('categorias.restaurar');
    Route::resource('categorias', CategoryController::class)->names('categorias');

    //* para restaurar etiquetas
    Route::resource('etiquetas', TagController::class)->names('etiquetas');
    Route::get('etiquetas/eliminar-definitivo/{id}', [TagController::class, 'deleteDefinitive'])->name('etiquetas.eliminar.definitivo');
    Route::get('etiquetas/restaurar/{id}', [TagController::class, 'restore'])->name('etiquetas.restaurar');

    //*Rutas para Configuraciones
    //Route::resource('configuraciones', SettingController::class)->names('configuraciones')->only(['index','store','edit','update']);

    //*Route TEMATICA;
    Route::resource('tematica', ThematicController::class)->names('tematica');
    //*Route TIPO DE LOGO;

    // Route::resource('tipoLogo', TypeLogoController::class)->names('tipoLogo');

    //*Route LOGO;
    // Route::resource('logo', LogoController::class)->names('logos');

    //*Route DIRECTIVES;
    Route::resource('directive', DirectiveController::class)->names('directives'); //actualizado por sergio

    //Route::resource('tipoLogo', TypeLogoController::class)->names('tipoLogo');

    //*Route LOGO;
    // Route::resource('logo',LogoController::class)->names('logos');

    // Inicio rutas para roles y permisos
    Route::get('roles/permisos/{id}', [RoleController::class, 'managePermissions'])->name('roles.permisos.administrar');
    Route::put('roles/permisos/{role}', [RoleController::class, 'updatePermissions'])->name('roles.permisos.actualizar');
    Route::resource('roles', RoleController::class)->names('roles');
    // Fin rutas para roles y permisos

    //Rutas sergio
    Route::resource('configuraciones', SettingController::class)->names('configuraciones')->only(['index', 'store', 'edit', 'update']);
    Route::resource('etiquetas', TagController::class)->names('etiquetas');

    Route::resource('posiciones', PositionController::class)->names('posiciones');
    Route::get('posiciones/eliminar-definitivo/{id}', [PositionController::class, 'deleteDefinitive'])->name('posiciones.eliminar.definitivo');
    Route::get('posiciones/restaurar/{id}', [PositionController::class, 'restore'])->name('posiciones.restaurar');

    Route::resource('tipo-logo', TypeLogoController::class)->names('tipoLogo');
    Route::resource('logos', LogoController::class)->names('logos');
    Route::resource('politica-juvenil', YouthPolicyController::class)->names('politicaJuvenil');
    Route::resource('slide', SlideController::class)->names('slide');
    Route::resource('estrategia-metropolitana', YouthStrategyController::class)->names('estrategiaMetropolitana');
    Route::resource('observatorio-juvenil', YouthObservatoryController::class)->names('observatorioJuvenil');
    Route::resource('notas-rapidas', GradeController::class)->names('notasRapidas');
});

//* locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//?Rutas para limpiar el caché
//Clear route cache
Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return 'Caché de rutas borrado';
});

/******************************
 * Limpiar caché del proyecto *
 ******************************/
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    return "La caché ha sido limpiada correctamente.";
});
