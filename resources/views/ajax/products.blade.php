@foreach($products as $product)
    <div style="position: relative;">
        <div style="padding:12px 5px">
            <img style="text-align: center ;width: 240px" class="image-main-content"
                 src="{{Storage::url($product->image)}}"alt="">

            <img class="image-heart" src="storage/heart.svg" alt=""
                 style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
            <h2 style="text-align: center">{{$product->name}}</h2>
            {{--                        @if($product->new_price )--}}
            {{--                            <p style="text-decoration: line-through ;text-align: center"> Старая цена:--}}
            {{--                                <b>{{$product->price}} грн. </b></p>--}}
            {{--                            <p style="text-align: center"> Новая цена: <b>{{$product->new_price}} грн. </b></p>--}}
            {{--                        @else--}}
            {{--                            <p style="text-align: center"> Цена: <b>{{$product->price}} грн. </b></p>--}}
            {{--                        @endif--}}
            <p style="text-align: center"> Цена: <b>{{$product->price}} грн. </b></p>
            <form action="{{route('basked-addd',$product)}} " method="post">
                @csrf
                <button type="submit" style="font-size: 13px" class="btn btn-success">Добавить в корзину
                </button>
                <a style="font-size: 13px " class="btn btn-outline-secondary"
                   href="{{route('product.show',$product->id)}}">Подробнее</a>

            </form>

        </div>
    </div>
@endforeach
