<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required|between:7,30|confirmed'
        ]);
        if($validator->fails()){
            return response(
                [
                    'errors' => $validator->errors()
                ], 422
            );
        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'password' => Hash::make($request->password),
        ]);

        Auth::loginUsingId($user->id);
        $token = Auth::user()->createToken('authToken')->accessToken;
        return response([
            'token' => $token
        ]);
    }

    public function login(Request $request){
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response(['message' => 'Неверный email или пароль!'], 422);
        }
        
        $token = Auth::user()->createToken('authToken')->accessToken;

        return response([
            'token' => $token
        ]);
    }

    public function user(){
        $user = User::with('favorites')->find(Auth::id());
        return response([
            'user' => $user
        ]);
    }

    public function edit(Request $request){
        $user = User::find(Auth::id());
        
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->save();

        return response([
            'user' => $user
        ]);
    }
}
