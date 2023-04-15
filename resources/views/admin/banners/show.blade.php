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
                <h1>{{$banner->title}}</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>
                            Поле
                        </th>
                        <th>
                            Значение
                        </th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{$banner->id}}</td>
                    </tr>

                    <tr>
                        <td>Название</td>
                        <td>{{$banner->title}}</td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{$banner->description}}</td>
                    </tr>
                    <tr>

                    <td>Картинка</td>
                    <td><img src="{{Storage::url($banner->image)}}" height="240px"></td>


{{--                        <td>--}}
{{--                            Лейблы--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <span class="badge badge-success">Новинка</span>--}}
{{--                            <span class="badge badge-warning">Рекомендуем</span>--}}
{{--                            <span class="badge badge-danger">Хит продаж!</span>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
        <a  href="{{route('admin.banners.index')}}" class="btn btn-outline-dark mt-3">Перейти ко всем банерам</a>

    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</html>
