<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create(Request $request){
        $feedback = Feedback::create([
            'text' => $request->text,  
            'user_id' => Auth::id(),
            'place_id' => $request->place_id,  
            'branches_amount' => $request->branches_amount,  
            'branches_condition' => $request->branches_condition,  
            'trashes_amount' => $request->trashes_amount,  
            'trashes_condition' => $request->trashes_condition,  
            'light' => $request->light,  
            'common_condition' => $request->common_condition,  
            'toilet' => $request->toilet,  
            'toilet_condition' => $request->toilet_condition,  
            'ramp' => $request->ramp,  
            'images' => $request->images,            
        ]);
        return response([
            'feedback' => $feedback
        ]);
    }

    public function one(Request $request){
        $feedback = Feedback::where([['user_id', '=', Auth::id()], ['place_id', '=', $request->placeId]])->first();
        return response([
            'feedback' => $feedback
        ]);
    }

    public function place(Request $request){
        $place = Place::find($request->placeId);
        return response([
            'feedbacks' => $place->feedbacks
        ]);
    }

    public function uploadImages(Request $request){
        
    }
}
