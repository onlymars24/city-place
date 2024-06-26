<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FeedbackController;

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

Route::middleware('auth:api')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/user/edit', [AuthController::class, 'edit']);
    Route::post('/user/upload/avatar', [AuthController::class, 'uploadAvatar']);
    Route::post('/favorite/add', [FavoriteController::class, 'add']);
    Route::post('/favorite/delete', [FavoriteController::class, 'delete']);
    Route::post('/feedback/create', [FeedbackController::class, 'create']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('/types', [TypeController::class, 'all']);
Route::post('/type/create', [TypeController::class, 'create']);

Route::get('/places', [PlaceController::class, 'all']);
Route::get('/place', [PlaceController::class, 'one']);
Route::get('/places/type', [PlaceController::class, 'type']);
Route::post('/place/create', [PlaceController::class, 'create']);
Route::post('/place/edit', [PlaceController::class, 'edit']);
Route::post('/place/upload/image', [PlaceController::class, 'uploadImage']);
Route::post('/place/delete/image', [PlaceController::class, 'deleteImage']);

Route::post('/place/upload/avatar', [PlaceController::class, 'uploadAvatar']);


Route::get('/feedback/place', [FeedbackController::class, 'place']);
Route::get('/feedback', [FeedbackController::class, 'one']);
Route::post('/feedback/delete', [FeedbackController::class, 'delete']);
Route::post('/feedback/upload/image', [FeedbackController::class, 'uploadImage']);
Route::post('/feedback/delete/image', [FeedbackController::class, 'deleteImage']);
