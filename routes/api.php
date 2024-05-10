<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\VisitorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('favorite', [MemberController::class, 'addToFavorite'])->middleware('auth:sanctum');

Route::get('show_main', [VisitorController::class, 'showBooksInMainCategory']);

Route::get('filter', [VisitorController::class, 'filter']);

Route::post('evaluate/{id}', [MemberController::class, 'addEvaluate'])->middleware('auth:sanctum');

//auth
// Route::group([
//     'middleware'=>'api',
//     'prefix'=>'auth'
// ],function($router){

// });