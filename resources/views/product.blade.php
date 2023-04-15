@extends('layouts.main')
@section('title', 'Продукты')
@section('content')
    <div class="container text-center " style="margin-bottom: 50px">


        <div >
            <div style="padding:12px 5px">
                <img style="text-align: center ;width: 240px" class="image-main-content"
                     src="{{Storage::url($product->image)}}"alt="">
                <h2 style="text-align: center">{{$product->name}}</h2>
                <p style="text-align: center"> <b>Цена: {{$product->price}} грн. </b></p>
                <p style="text-align: center"> Описание: {{$product->description}} .грн </p>
                <form action="{{route('basked-addd',$product)}} " method="get">
                    @csrf
                    <button type="submit" style="font-size: 13px" class="btn btn-success add-to-basket my-anime"
                            data-product-id="{{$product->id}}">Добавить в корзину
                    </button>
                    <a style="font-size: 13px " class="btn btn-outline-secondary" href="{{route('product.show',$product->id)}}">Сообщить когда будет в наличии</a>

                </form>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/addOneProduct.js') }}"></script>
@endsection
