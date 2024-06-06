<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class ImageService
{
    public static function upload($table, $file, $id){
            // $file = $request->file('file');
            $path = $file->store('image');
            $row = DB::table($table)->find($id);
            $image = (array)json_decode($row->image);
            $image[] = $path;
            DB::table($table)->where('id', $id)->update(['image' => json_encode($image)]);
    }

    public static function delete($table, $file, $id){
        $row = DB::table($table)->find($id);
        $image = (array)json_decode($row->image);

        unset($image[array_search($file, $image)]);
        
        DB::table($table)->where('id', $id)->update(['image' => json_encode($image)]);
}
}