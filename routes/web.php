<?php

use App\Http\Controllers\mainController;
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
    return view('welcome');
});
Route::get('/checklist', [mainController::class, "getCheckAll"]);
Route::post('/checklist', [mainController::class, "createCL"]);
Route::delete('/checklist/{id}', [mainController::class, "deleteCL"]);

Route::get('/checklist/{id}/item', [mainController::class, "getItem"]);
Route::post('/checklist/{id}/item', [mainController::class, "createItem"]);
Route::get('/checklist/{Cid}/item/{Iid}', [mainController::class, "getItemId"]);
Route::put('/checklist/{checklistId}/item/{itemId}', [mainController::class, "updateItem"]);
Route::delete('/checklist/{Cid}/item/{Iid}', [mainController::class, "deleteItem"]);
Route::put('/checklist/{Cid}/item/rename/{Iid}', [mainController::class, "renameItem"]);

Route::get('/token', function () {
    return csrf_token();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__ . '/auth.php';
