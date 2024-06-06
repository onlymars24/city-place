<?php

use App\Models\User;
use App\Models\Place;
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
    $place = Place::find(1);
    $arrPlace = (array)json_decode($place->image);
    unset($arrPlace[array_search('qaz', $arrPlace)]);
    
    dd();
});