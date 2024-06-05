<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class ImageService
{
    public static function upload($table, $file, $id){
            // $file = $request->file('file');
            $path = $file->store('image');
            $row = DB::table($table)->find($id);
            $filePath = public_path($row->image);
            // if(File::exists($filePath)) {
            //     File::delete($filePath);
            // }
            DB::table($table)->where('id', $id)->update(['image' => $path]);
    }
}