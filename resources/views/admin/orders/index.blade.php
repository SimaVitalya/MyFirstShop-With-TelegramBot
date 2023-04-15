@extends('admin.layouts.master')
@section('content')
    <div class="container" >
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Когда отправлен

                <th>
                    Статус
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Действия
                </th>
            </tr>
    </div>
            @foreach($orders as $order)

                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->orderUser->name }}</td>
                    <td>{{ $order->orderUser->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{$order->status}}
                    <td>{{ $order->total_price }}  ₴</td>



                    <td>
                        <div class="btn-group" role="group">
                            <div>

                                <form method="post"
                                      action="{{route('admin.orders.destroy',$order->id)}}">
                                    <a class="btn btn-success" type="button"
                                       href="{{route('admin.orders.show',$order->id)}}">Открыть</a>
                                    <a class="btn btn-warning" type="button"
                                       href="{{route('admin.orders.edit',$order->id)}}">Редактировать</a>
                                    @method('DELETE')
                                    @csrf


                                    <input class="btn btn-danger"
                                           type="submit" value="Удалить">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{$orders->links()}}--}}

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</html>
@endsection
