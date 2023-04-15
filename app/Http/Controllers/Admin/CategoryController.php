<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreRequests;
use App\Http\Requests\Admin\Categories\UpdateRequests;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequests $request)
    {
        $data = $request->all();
        $category = Category::create($request->post());
        if ($request->hasFile('image')) { //если в запросе есть файл имейдж
            $path = $request->file('image')->store('public/categories');//мы ложем в переменную нашу картинку из формы в паблик имейд
            $category->image = $path;
            $category->save();
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequests $request, Category $category)
    {
        $data = $request->all();

        unset($data['image']);//что бы проходила вадидация мы удаляем картинку сразу
        if ($request->has('image')) {//если есть то мы удаляем ее из сторейдж
            Storage::delete($category->image);
            $data['image'] = $request->file('image')->store('public/categories');
        }
        $category->update($data);

        return redirect()->route('admin.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
