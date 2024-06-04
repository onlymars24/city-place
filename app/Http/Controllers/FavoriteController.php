<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request){
        $user = User::find(Auth::id());
        $user->favorites()->attach($request->placeId);
    }

    public function delete(Request $request){
        $user = User::find(Auth::id());
        $user->favorites()->detach($request->placeId);
    }
}
