<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function create(Request $request)
    {
        $image = $request->image;
        
        if (!empty($image)) {
            $ext = $image->getClientOriginalExtension();
            $newName = time() . '.' . $ext;
            
            $img = new Image();
            $img->name = $newName;
            $img->save();

            $image->move(public_path() . '/uploads/img', $newName);

            $srcPath = public_path() . '/uploads/img/' . $newName;
            $destPath = public_path() . '/uploads/blogs/hidden/' . $newName;
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($srcPath);
            $image->cover(800, 250);
            $image->save($destPath);

            return response()->json([
                'status' => true,
                'image_id' => $img->id,
                'ImagePath' => asset('/uploads/blogs/hidden/' . $newName),
                'message' => 'Image Uploaded Successfully.',
            ]);
        }
    }
}