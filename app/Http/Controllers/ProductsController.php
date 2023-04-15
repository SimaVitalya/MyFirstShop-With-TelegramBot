<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(25);
        if (isset($request->orderBy)) {
            if ($request->orderBy == 'price-low-high') {
                $products = Product::orderBy('price', 'asc')->get();
            }
            if ($request->orderBy == 'price-high-low') {
                $products = Product::orderBy('price', 'desc')->get();
            }
            if ($request->orderBy == 'name-a-z') {
                $products = Product::orderByRaw('LOWER(name)')->get();
                //orderByRaw('LOWER(name)') сортирует имена в алфавитном порядке от А до Я
                // (для русских и английских имен).
            }
            if ($request->orderBy == 'name-z-a') {
                $products = Product::orderByRaw('LOWER(name) DESC')->get();
            }


        }
        if ($request->ajax()) {
            return view('ajax.products', [
                'products' => $products
            ])->render();
        }
        return view('products', compact('products'));

    }
}
