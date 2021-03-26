<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
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
    return view('welcome');
});
Route::get('/residents/export', [ResidentController::class, 'export'])->name('residents.export');
Route::post('/residents/import', [ResidentController::class, 'import'])->name('residents.import');
Route::resource('residents', ResidentController::class);

