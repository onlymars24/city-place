<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function all(Request $request){
        return response([
            'places' => Place::with('type')->all()
        ]);
    }

    public function one(Request $request){
        return response([
            'place' => Place::with('type')->find($request->placeId)
        ]);
    }

    public function type(Request $request){
        $type = Type::find($request->typeId);
        return response([
            'places' => $type->places
        ]);
    }

    public function create(Request $request){
        $place = Place::create([
            'name' => $request->name,
            'descr' => $request->descr,
            'location_x' => $request->location_x,
            'location_y' => $request->location_y,
            'location_address' => $request->location_address,
            'type_id' => $request->type_id,
        ]);
        return response([
            'place' => $place
        ]);
    }

    public function edit(Request $request){
        $place = Place::find($request);
        $place->name = $request->name;
        $place->descr = $request->descr;
        $place->location_x = $request->location_x;
        $place->location_y = $request->location_y;
        $place->location_address = $request->location_address;
        $place->type_id = $request->type_id;
        $place->save();
        return response([
            'place' => $place
        ]);
    }
}
