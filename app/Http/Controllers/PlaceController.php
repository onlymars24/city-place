<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ImageService;

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
        $place = Place::find($request->placeId);
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

    public function uploadImage(Request $request){
        if($request->hasFile('image')){
            ImageService::upload('places', $request->file('image'), $request->feedbackId);
        }
    }

    public function uploadAvatar(Request $request){
        if($request->hasFile('avatar')){
            // ImageService::upload('feedback', $request->file('image'), $request->feedbackId);
            $file = $request->file('avatar');
            $path = $file->store('image');
            $row = DB::table('places')->find($request->feedbackId);
            $filePath = public_path($row->image);
            DB::table('places')->where('id', $request->feedbackId)->update(['avatar' => $path]);
        }
    }
}
