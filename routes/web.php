<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JiraListController;

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

Route::get('/', [JiraListController::class, 'index']);


Route::post('/saveItemRoute',  [JiraListController::class, 'saveItem'])->name('saveItem');

Route::post('/markCloseRoute/{id}',  [JiraListController::class, 'markClose'])->name('markClose');
Route::post('/markDeleteRoute/{id}',  [JiraListController::class, 'markDelete'])->name('markDelete');
Route::post('/markOpenRoute/{id}',  [JiraListController::class, 'markOpen'])->name('markOpen');

