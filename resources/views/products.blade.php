@extends('layouts.main')
@section('title', 'Продукты')
@section('content')
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

    <div class="container  ">
        <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-end"
             style="margin-bottom: 30px;margin-right: 50px;margin-top: 30px">
            <div class="results">Показано <span>{{count($products)}}</span> товаров</div>
            <div class="sorting_container ml-md-auto">
                <div class="dropdown sorting" style="margin-left: 10px">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="search_name">Сортировать по</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-item product_sorting_btn" data-order="default">Стандартное</li>
                        <li class="dropdown-item product_sorting_btn" data-order="price-low-high">Цена:
                            Низкая-Высокая
                        </li>
                        <li class="dropdown-item product_sorting_btn" data-order="price-high-low">Цена:
                            Высокая-Низкая
                        </li>
                        <li class="dropdown-item product_sorting_btn" data-order="name-a-z">Имени: А-Я</li>
                        <li class="dropdown-item product_sorting_btn" data-order="name-z-a">Имени: Я-A</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap custom_filter">
            @foreach($products as $product)
                <div style="position: relative;">
                    <div style="padding:12px 5px">
                        <img style="text-align: center ;width: 240px" class="image-main-content"
                             src="{{Storage::url($product->image)}}"
                             alt="">
                        <img class="image-heart" src="storage/heart.svg" alt=""
                             style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
                        <h2 style="text-align: center ;width: 210px">{{$product->name}}</h2>
                        {{--                        @if($product->new_price )--}}
                        {{--                            <p style="text-decoration: line-through ;text-align: center"> Старая цена:--}}
                        {{--                                <b>{{$product->price}} грн. </b></p>--}}
                        {{--                            <p style="text-align: center"> Новая цена: <b>{{$product->new_price}} грн. </b></p>--}}
                        {{--                        @else--}}
                        {{--                            <p style="text-align: center"> Цена: <b>{{$product->price}} грн. </b></p>--}}
                        {{--                        @endif--}}
                        <p style="text-align: center"> Цена: <b>{{$product->price}} грн. </b></p>
                        <form action="{{route('basked-addd',$product)}} " method="GET">                            @csrf
                            <button type="submit" style="font-size: 13px" class="btn btn-success add-to-basket my-anime"
                                    data-product-id="{{$product->id}}">Добавить в корзину
                            </button>
                            <a style="font-size: 13px " class="btn btn-outline-secondary"
                               href="{{route('product.show',$product->id)}}">Подробнее</a>

                        </form>

                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center mt-4">{{$products->links()}}</div>
    </div>


    <script src="{{ asset('js/addOneProduct.js') }}"></script>

    <script src="{{ asset('js/search.js') }}"></script>
    `
@endsection
