@extends('layouts.main')
@section('title', 'Категории')
@section('content')
    <div class="container ">
        <div class="starter-template">
            @foreach($categories as $category)
                <div class="panel">
                    <a href="{{route('categories.show',$category->name)}}">
                        <img class="img-size"    src="{{Storage::url($category->image)}}">
                        <h2>{{$category->name}}</h2>
                    </a>
                    <p>
                        {{$category->description}}
                    </p>
                </div>
            @endforeach
        </div>
@endsection
