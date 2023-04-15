@extends('admin.layouts.master')
@section('content')
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <h1>Продукты</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Код
                        </th>
                        <th>
                            Название
                        </th>
                        <th>
                            Действия
                        </th>
                    </tr>
                    <tr>
                        @foreach($products as $product)
                            <td>{{$product->id}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <div>

                                        <form method="post"
                                              action="{{route('admin.products.destroy',$product->id)}}">
                                            <a class="btn btn-success" type="button"
                                               href="{{route('admin.products.show',$product->id)}}">Открыть</a>
                                            <a class="btn btn-warning" type="button"
                                               href="{{route('admin.products.edit',$product->id)}}">Редактировать</a>
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
                    <tr>

                    </tbody>
                </table>


                <a class="btn btn-success" type="button" href="{{route('admin.products.create')}}">Добавить
                    продукт</a>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</html>
@endsection
