<?php


use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('product' , [
        "title" => "Home"
    ]);
});

// gunakan middleware yang belum ter authentufucation(guest)
Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::post('/register', [RegisterController::class, "store"]);


// Route::get('/dashboard', function() {
//     return view('dashboard.index', [
//         'title'=> 'Dashboard',
//     ]);
// })->middleware('auth');

Route::resource('/dashboard', DashboardPostController::class)->middleware('auth');
