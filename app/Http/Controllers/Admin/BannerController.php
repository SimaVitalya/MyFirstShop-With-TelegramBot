<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banners\StoreRequests;
use App\Http\Requests\Admin\Banners\UpdateRequests;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::get();
        return view('admin.banners.index', compact('banners'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('admin.banners.create', compact('categories'));
    }

    public function store(StoreRequests $request)
    {
        $data = $request->all();
        $banners = Banner::create($request->all());
        if ($request->hasFile('image')) { //если в запросе есть файл имейдж
            $path = $request->file('image')->store('public/banners');//мы ложем в переменную нашу картинку из формы в паблик имейд
            $banners->image = $path;
            $banners->save();
        }

        return redirect()->route('admin.banners.index');
    }


    public function show(Banner $banner)
    {

        return view('admin.banners.show', compact('banner'));
    }


    public function edit(Banner $banner)
    {
        $categories = Category::get();

        return view('admin.banners.edit', compact('banner', 'categories'));
    }


    public function update(UpdateRequests $request, Banner $banner)
    {
        $data = $request->all();

        unset($data['image']);
        if ($request->has('image')) {
            Storage::delete($banner->image);
            $data['image'] = $request->file('image')->store('public/banners');
        }
        $banner->update($data);

        return redirect()->route('admin.banners.index');

    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index');
    }
}
