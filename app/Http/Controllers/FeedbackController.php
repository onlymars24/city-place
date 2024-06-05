<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create(Request $request){
        $feedback = Feedback::create([
            'text' => $request->text,  
            'user_id' => Auth::id(),
            'place_id' => $request->place_id,  
            'score' => $request->score,  
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

    public function uploadImage(Request $request){
        if($request->hasFile('image')){
            ImageService::upload('feedback', $request->file('image'), $request->feedbackId);
        }
    }
}
