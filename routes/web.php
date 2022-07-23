<?php

use App\Models\admin\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\admin\NewController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\About_cmpjController;
use App\Http\Controllers\admin\ConfigCompanyController;
use App\Http\Controllers\admin\Youth_observatoryController;
use App\Http\Controllers\admin\TypeLogoController;
use App\Http\Controllers\admin\LogoController;


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

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

    //*Route aboutsObservatory
    Route::resource('juvenilesObservatorio', Youth_observatoryController::class)->names('juvenilesObservatorio');
    Route::resource('sobreCmpj', About_cmpjController::class)->names('sobreCmpj');

    //*Rutas para dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');

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
    // Route::resource('categorias', CategoryController::class)->names('categorias');

    //* para restaurar etiquetas
    Route::resource('etiquetas', TagController::class)->names('etiquetas');
    Route::get('etiquetas/eliminar-definitivo/{id}', [TagController::class, 'deleteDefinitive'])->name('etiquetas.eliminar.definitivo');
    Route::get('etiquetas/restaurar/{id}', [TagController::class, 'restore'])->name('etiquetas.restaurar');

    //*Rutas para Configuraciones
    //Route::resource('configuraciones', SettingController::class)->names('configuraciones')->only(['index','store','edit','update']);

     //*Route TIPO DE LOGO;
     Route::resource('tipoLogo', TypeLogoController::class)->names('tipoLogo');

      //*Route LOGO;
      Route::resource('logo',LogoController::class)->names('logos');

    // Inicio rutas para roles y permisos
    Route::get('roles/permisos/{id}', [RoleController::class, 'managePermissions'])->name('roles.permisos.administrar');
    Route::put('roles/permisos/{role}', [RoleController::class, 'updatePermissions'])->name('roles.permisos.actualizar');
    Route::resource('roles', RoleController::class)->names('roles');
    // Fin rutas para roles y permisos


});
Route::group(['middleware' => ['permission:categorias.index|categorias.create|categorias.edit|categorias.destroy']], function () {
    Route::resource('categorias', CategoryController::class)->names('categorias');
});

Route::group(['middleware' => ['permission:configuraciones.index|configuraciones.edit']], function () {
    Route::resource('configuraciones', SettingController::class)->names('configuraciones')->only(['index','store','edit','update']);
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
