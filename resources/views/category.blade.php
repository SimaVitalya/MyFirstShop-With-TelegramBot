@extends('layouts.main')
@section('title', 'Категории')
@section('content')



    @if ($products === null)
        <div class="container">
            <h2 style="text-align: center ;margin-bottom: 370px">Продуктов в данной категории еще нет</h2>
        </div>
    @else
        <div class="container " style="margin-bottom: 50px">
            <div class="starter-template">
                <h2>

                    {{$category->name }}
                </h2>
                <p>Количество товаров : {{ $productCount }}</p>
                <p>
                    {{$category->description}}
                </p>
            </div>
            <div class="d-flex flex-wrap">
                @foreach($products as $product)
                    <div style="position: relative;">
                        <div style="padding:12px 5px">
                            <img style="text-align: center ;width: 240px" class="image-main-content"
                                 src="{{Storage::url($product->image)}}"
                                 alt="">
                            <img class="image-heart" src="storage/heart.svg" alt=""
                                 style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
                            <h2 style="text-align: center">{{$product->name}}</h2>
                            <p style="text-align: center"> Цена: <b>{{$product->price}} .грн </b></p>
                            <form action="{{route('basked-addd',$product)}} "
                                  method="GET">                            @csrf
                                <button type="submit" style="font-size: 13px"
                                        class="btn btn-success add-to-basket my-anime"
                                        data-product-id="{{$product->id}}">Добавить в корзину
                                </button>
                                <a style="font-size: 13px " class="btn btn-outline-secondary"
                                   href="{{route('product.show',$product->id)}}">Подробнее</a>

                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('js/addOneProduct.js') }}"></script>


@endsection
