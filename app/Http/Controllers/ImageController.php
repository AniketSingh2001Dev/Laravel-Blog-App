<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors(),
    //         ]);
    //     }
    // }
}