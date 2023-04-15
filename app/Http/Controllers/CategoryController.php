<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));

    }

    public function show($name)
    {
        $category = Category::where('name', $name)->first();
        $products = $category ? $category->products : null;//достаем продукт из нашей связи между категориями и продуктами

        $productCount = $products ? $products->count() : 0;

        return view('category', compact('category', 'products', 'productCount'));
    }
}
