@extends('layouts.main')
@section('title', 'Корзина')
@section('content')


    <div class="container">

        <div class="container" style="margin-bottom:150px">
            <div class="starter-template">
                <h1>Корзина</h1>
                <p>Оформление заказа</p>
                <div class="panel">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody class="products_body">

                        </tbody>
                    </table>
                    <br>
                    <div style="margin-bottom: 100px;" class="btn-group pull-right" role="group">
                        <a type="button" class="btn btn-success" href="https://internet-shop.tmweb.ru/basket/place">Оформить
                            заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

