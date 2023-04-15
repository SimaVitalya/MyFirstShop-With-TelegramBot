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
<style>
    a {
        color: black; /* цвет ссылки по умолчанию */
        text-decoration: none;
    }

    a:hover {
        color: rgba(128, 128, 128, 0.51); /* цвет ссылки при наведении */
    }
</style>
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">

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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->orderProducts as $test)

                                    <tr>
                                        <td>

                                            <a href="" >
                                                <img height="56px "style="margin-right: 6px;text-decoration: none"
                                                     src="{{Storage::url($test->image)}}">
                                                {{$test->name}}
                                            </a>

                                        </td>

                                        <td><span class="badge" style="color: #1b1e21">{{$test->count}}</span></td>

                                        <td>{{$test->price}}</td>
                                        <td>{{$test->fullprice}}</td>
                                    </tr>
                                    <tr>
                                        @endforeach
                                    <td colspan="3">Общая стоимость:</td>
                                    <td>{{$order->total_price}}грн</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('admin.orders.index')}}" class="btn btn-outline-dark">Перейти ко всем заказам</a>

    </div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</html>
