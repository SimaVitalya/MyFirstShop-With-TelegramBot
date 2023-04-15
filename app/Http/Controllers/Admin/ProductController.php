<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreRequests;
use App\Http\Requests\Admin\Products\UpdateRequests;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreRequests $request)
    {
        $data = $request->all();
        $product = Product::create($request->all());
        if ($request->hasFile('image')) { //если в запросе есть файл имейдж
            $path = $request->file('image')->store('public/products');//мы ложем в переменную нашу картинку из формы в паблик имейд
            $product->image = $path;
            $product->save();
        }

        return redirect()->route('admin.products.index');
    }


    public function show(Product $product)
    {

        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::get();

        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(UpdateRequests $request, Product $product)
    {
        $data = $request->all();

        unset($data['image']);
        if ($request->has('image')) {
            Storage::delete($product->image);
            $data['image'] = $request->file('image')->store('public/products');
        }
        $product->update($data);

        return redirect()->route('admin.products.index');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
