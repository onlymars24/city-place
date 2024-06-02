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
}
