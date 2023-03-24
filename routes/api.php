<?php

use App\Http\Controllers\mainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add', [mainController::class, 'insert']);
Route::get('/check', [mainController::class, 'check_email']);
Route::get('/ordre', [mainController::class, 'ordre']);
Route::get('/edit/{id}', [mainController::class, 'edit']);
Route::put('/edit/{id}', [mainController::class, 'update']);

Route::get('/ideas', [mainController::class, 'get_all']);
Route::put('/valid/{id}/{valide}', [mainController::class, 'valid']);
Route::get('/ideas_accepted', [mainController::class, 'idea_accepted']);
Route::get('/ideas_accepted/count', [mainController::class, 'idea_accepted_count']);
Route::delete('/delete_refused', [mainController::class, 'delete_refused']);