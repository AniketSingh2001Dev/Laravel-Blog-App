<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    // public function store(Request $request)
    // {
    //     $rules = [
    //         'image' => 'required|image',
    //     ];
        
    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->passes()) {
    //         $image = $request->image;
    //         $ext = $image->getClientOriginalExtension();
    //         $imageName = time() . '.' . $ext;
            
    //         $img = new Image();
    //         $img->name = $imageName;
    //         $img->save();
            
    //         $image->move(public_path('/uploads/img/'), $imageName);
            
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Image Uploaded Successfully.',
    //             'image_id' => $img->id,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors(),
    //         ]);
    //     }
    // }
}