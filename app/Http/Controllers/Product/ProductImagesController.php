<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImagesController extends Controller
{
    public function index()
    {
    	return view('product.image.image_upload');
    }

    public function store(Request $request)
    {
        $imageName = request()->file->getClientOriginalName();
        request()->file->move(public_path('uploads'), $imageName);


    	return response()->json(['uploaded' => '/uploads/'.$imageName]);
    }
}
