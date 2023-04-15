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

{{--@dd($order)--}}
<style>
    a {text-decoration: none;color: black;}
    a:hover {color: rgba(128, 128, 128, 0.47);}
</style>
<body>
<div class="py-4">
    <div class="container">
        <div class="justify-content-center">
            <div class="panel">
                <h1>Заказ {{$order->id}}</h1>
                <p>Заказчик: <b>{{$order->orderUser->name}}</b></p>
                <p>Номер телефона: <b>{{$order->orderUser->phone}}</b></p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    @foreach ($order->orderProducts as $test)

                    <tbody>
                    <tr>


                            <td>
                            <a  href="{{route('product.show',$test->product_id)}}">
                                <img height="56px" style="margin-right: 6px; text-decoration: none"
                                     src="{{Storage::url($test->image)}}">
                                {{$test->name}}
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.orders.update',$order->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="d-flex  ">
                                    <input type="hidden" name="product_id" value="{{$test->id}}">

                                    <input style="width: 100px  ;margin-right: 5px" type="number" name="count"
                                           value="{{ $test->count }}"
                                           min="1">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Изменить</button>
                                </div>
                            </form>
                            @error('count')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </td>
                        <td>{{$test->price}}</td>
                        <td>{{$test->price*$test->count}}</td>
                        <td>
                            <div class="d-flex  ">
                                <form method="POST" action="{{ route('admin.orders.update',$order->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="form-control">
                                        <option value="{{ $order->status }}" selected>{{ $order->status }}</option>
                                        <option value="Новый" {{ $order->status == 'Новый' ? 'disabled' : '' }}>Новый
                                        </option>
                                        <option
                                            value="Подтвержден" {{ $order->status == 'Подтвержден' ? 'disabled' : '' }}>
                                            Подтвержден
                                        </option>
                                        <option value="В пути" {{ $order->status == 'В пути' ? 'disabled' : '' }}>В
                                            пути
                                        </option>
                                        <option value="Завершен" {{ $order->status == 'Завершен' ? 'disabled' : '' }}>
                                            Завершен
                                        </option>
                                        <option value="Отменен" {{ $order->status == 'Отменен' ? 'disabled' : '' }}>
                                            Отменен
                                        </option>
                                    </select>
                                </form>
                                @error('status')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td>{{$order->total_price}}грн</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <a href="{{route('admin.orders.index')}}" class="btn btn-outline-dark">Перейти ко всем заказам</a>

            </div>
        </div>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</html>
