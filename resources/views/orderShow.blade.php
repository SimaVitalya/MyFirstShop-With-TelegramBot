
@extends('layouts.main')
@section('title', 'Заказы')
@section('content')
    <div class="py-4">
        <div class="container" style="margin-bottom: 100px">
            <div class="row justify-content-center">

                <div class="py-4">
                    <div class="container">
                        <div class="justify-content-center">
                            <div class="panel">
                                <h1>Заказ №1</h1>
                                <p>Заказчик: <b>Vitaly</b></p>
                                <p>Номер телефона: <b>Simachev</b></p>
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
                                    <tr>
                                        <td>
                                            <a href="http://last/mobiles/iphone_x_64">
                                                <img height="56px"
                                                     src="http://last//storage/products/iphone_x.jpg">
                                                iPhone X 64GB
                                            </a>
                                        </td>
                                        <td><span class="badge">1</span></td>
                                        <td>71990 руб.</td>
                                        <td>215970 руб.</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Общая стоимость:</td>
                                        <td>215970 руб.</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
