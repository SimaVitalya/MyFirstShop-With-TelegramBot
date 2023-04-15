<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $banners =Banner::get();
        $products =Product::get();
        return view('index',compact('banners','products'));
    }
}
