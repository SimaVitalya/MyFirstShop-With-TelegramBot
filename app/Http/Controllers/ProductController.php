<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index( $productId){
        $product = Product::where('id', $productId)->first();
        return view('product',compact('product','productId'));

    }
}
