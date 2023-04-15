<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <h1>Редактировать товар</h1>
                <form method="POST" enctype="multipart/form-data"
                      action="{{route('admin.products.update',$product->id)}}"
                >
                    @method('PATCH')
                    @csrf
                    <div>
                        <div class="input-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="code" id="code"
                                       value="{{$product->code}}" placeholder="Код">
                            </div>
                            @error('code')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="input-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="name"
                                       value="{{$product->name}}" placeholder="Название">
                            </div>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div>
                            <h5>Категория</h5>
                        </div>

                        <div class="input-group row">

                            <div class="col-sm-6">
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @isset($product)
                                                @if($product->category_id == $category->id)
                                                selected
                                            @endif
                                            @endisset>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="input-group row">
                            <div class="col-sm-6">
                                <textarea name="description" id="description" cols="72" rows="7" placeholder="Описание">{{$product->description}}</textarea>
                            </div>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="input-group row">
                            <div style="margin-bottom: 10px">
                                <img src="{{Storage::url($product->image)}}"
                                     height="300px"></td>
                            </div>

                            <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                            <div class="col-sm-10">
                                <label class="btn btn-outline-dark btn-file">
                                    Загрузить <input type="file" style="display: none;" name="image" id="image">
                                </label>
                            </div>
                        </div>
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <div class="input-group row">
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="price" id="price"
                                       value="{{$product->price}}" placeholder="Цена">
                            </div>
                            @error('price')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="input-group row">
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="new_price" id="price"
                                       value="{{$product->new_price}}" placeholder="Новая цена">
                            </div>
                            @error('new_price')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>    <br>
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </form>

                        {{--                        <div class="input-group row">--}}
                        {{--                            <label for="count" class="col-sm-2 col-form-label">Кол-во: </label>--}}
                        {{--                            <div class="col-sm-2">--}}
                        {{--                                <input type="text" class="form-control" name="count" id="count"--}}
                        {{--                                       value="">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <br>--}}
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label for="code" class="col-sm-2 col-form-label">Хит: </label>--}}
                        {{--                            <div class="col-sm-10">--}}
                        {{--                                <input type="checkbox" name="hit" id="hit"--}}
                        {{--                                >--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <br>--}}
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label for="code" class="col-sm-2 col-form-label">Новинка: </label>--}}
                        {{--                            <div class="col-sm-10">--}}
                        {{--                                <input type="checkbox" name="new" id="new"--}}
                        {{--                                >--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <br>--}}
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label for="code" class="col-sm-2 col-form-label">Рекомендуемые: </label>--}}
                        {{--                            <div class="col-sm-10">--}}
                        {{--                                <input type="checkbox" name="recommend" id="recommend"--}}
                        {{--                                >--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

            </div>
        </div>
        <a href="{{route('admin.products.index')}}" class="btn btn-outline-dark mt-3">Перейти ко всем продуктам</a>


    </div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</html>
