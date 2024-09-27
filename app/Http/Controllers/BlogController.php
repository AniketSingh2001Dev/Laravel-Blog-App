<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();

        return view('blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'desc' => 'required',
            'description' => 'required',
            'author' => 'required',
            // 'image_id' => 'nullable|exists:images,id',
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->desc = $request->desc;
            $blog->description = $request->description;
            $blog->author = $request->author;
            $blog->save();

            // if ($request->image_id) {
            //     $image = Image::find($request->image_id);
            //     if ($image) {
            //         $imgExtArr = explode('.', $image->name);
            //         $ext = last($imgExtArr);
            //         $imageName = $blog->id . '-' . time() . '.' . $ext;
                    
            //         $srcPath = public_path('/uploads/img/' . $image->name);
            //         $destPath = public_path('/uploads/blogs/' . $imageName);
            //         File::copy($srcPath, $destPath);
                    
            //         $blog->image = $imageName;
            //         $blog->save();
            //     }
            // }

            $request->session()->flash('success', 'Blog Created Successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Blog Created Successfully.',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {        
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required',
            'desc' => 'required',
            'description' => 'required',
            'author' => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $blog->title = $request->title;
            $blog->desc = $request->desc;
            $blog->description = $request->description;
            $blog->author = $request->author;
            $blog->save();

            // $image = Image::find($request->image_id);

            // if ($image != null) {
            //     $imgExtArr = explode('.', $image->name);
            //     $ext = last($imgExtArr);
            //     $imageName = $blog->id . '-' . time() . '.' . $ext;

            //     $blog->image = $imageName;
            //     $blog->save();

            //     $srcPath = public_path('/uploads/img/' . $image->name);
            //     $destPath = public_path('/uploads/blogs/' . $imageName);
            //     File::copy($srcPath, $destPath);
            // }

            $request->session()->flash('success', 'Blog Updated Successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Blog Updated Successfully.',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Blog $blog)
    {
        $blog->delete();
        
        $request->session()->flash('success', 'Blog Deleted Successfully.');

        return response()->json([
            'status' => true,
            'message' => 'Blog Deleted Successfully.',
        ]);
    }
}