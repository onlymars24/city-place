<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function all(Request $request){
        return response([
            'places' => Place::all()
        ]);
    }

    public function one(Request $request){
        return response([
            'place' => Place::find($request->placeId)
        ]);
    }

    public function type(Request $request){
        $type = Type::find($request->typeId);
        return response([
            'places' => $type->places
        ]);
    }
}
