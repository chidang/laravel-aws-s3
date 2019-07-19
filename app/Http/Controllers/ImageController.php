<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Requests\StoreImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function getImages()
    {
        return view('images')->with('images', Image::all());
    }

    public function postUpload(StoreImage $request)
    {
        $path = Storage::disk('s3')->put('images/originals', $request->file);
        $request->merge([
            'size' => $request->file->getClientSize(),
            'path' => $path
        ]);
        Image::create($request->only('path', 'title', 'size'));
        return back()->with('success', 'Image Successfully Saved');
    }
}
