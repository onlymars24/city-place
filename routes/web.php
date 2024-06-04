<?php

use App\Models\User;
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

Route::get('/qwerty', function () {
    $userId = 1;
    $placeId = 2;
    $user = User::with('favorites')->find($userId);
    // dd($user);
    // $user->favorites()->attach($placeId);
    $user->favorites()->detach($placeId);

});