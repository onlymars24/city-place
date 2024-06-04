<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function all(){
        return response([
            'types' => Type::all()
        ]);
    }

    public function create(Request $request){
        $type = Type::create([
            'name' => $request->name
        ]);
        return response([
            'type' => $type
        ]);
    }
}
