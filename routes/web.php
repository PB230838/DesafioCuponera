<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CuponesController;
use App\Models\Cupon;
use Illuminate\Support\Facades\Auth;
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

Route::get("/", function(){
    $cupones = Cupon::where("cantidad_disponible", ">", 0)->get();
    return view("welcome", compact("cupones"));
})->name("welcome");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// theme routes
Route::view('blank', 'webkit')->name('webkit');
Route::view('mazer','mazer')->name('mazer');

Route::group([
    'as' => 'frontend.'
], function () {
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
});

Route::group([
    'middleware' => 'auth'
], function () {
    // Admin Routes
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth']
    ], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::resource('empresas', EmpresaController::class);
        Route::resource('cupones', CuponesController::class);


        Route::resource('blogs', AdminBlogController::class);
    });
    // User routes

    // Common routes
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{user}/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get("/comprar-cupon/{cupon}", [CuponesController::class, "comprarCupon"])->name("comprar");
    Route::post("/guardar-compra-cupon/{cupon}", [CuponesController::class, "guardarCompra"])->name("guardar.compra");
});
