@extends('layouts.main')
@section('title', 'Заказы')
@section('content')
    <div class="container " style="margin-bottom:130px;">
        <div class="starter-template">
            <h1>Подтвердите заказ:</h1>
            <div class="container">
                <div class="form-order">
                    <p>Общая стоимость: <b>{{$totalPrice}} ₴.</b></p>

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf

                        <div class="mx-auto">
                            <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <div class="mx-auto" style="width: 85%;">
                                                <input type="text" class="form-control input-order" name="name"
                                                       placeholder="Введите имя" value="{{ old('name') }}" required>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="email" class="form-control input-order" name="email"
                                                       placeholder="Введите email" value="{{ old('email') }}" required>
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="text" class="form-control input-order" name="phone"
                                                       placeholder="Введите номер телефона" value="{{ old('phone') }}"
                                                       required>
                                                @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success " value="Подтвердите заказ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
