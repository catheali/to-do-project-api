<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
// });

Route::post('login', [AuthController::class, 'login']);
Route::get('me', [AuthController::class, 'me']);

Route::get('users',[UserController::class, 'getAllUsers']);
Route::post('users',[UserController::class, 'createUser']);
Route::post('user/{id}',[UserController::class, 'updateUser']);
//Route::get('auth',[AuthController::class, 'refresh']);

Route::post('projects',[ProjectsController::class, 'createProject']);
Route::get('projects',[ProjectsController::class, 'getAllProjects']);



Route::get('projects/{id}',[ProjectsController::class, 'getMyProjects']);
Route::post('projects/{post}',[ProjectsController::class,'updateProject']);
Route::delete('projects/{idPost}',[ProjectsController::class,'deleteProject']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
