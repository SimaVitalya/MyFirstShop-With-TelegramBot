<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: @yield('title')</title>
    <base href="{{ asset('/') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;800&display=swap" rel="stylesheet">
    {{--    <script src="/js/jquery.min.js"></script>--}}
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"--}}
    {{--          integrity="sha512-J61YcYjGvJUcS6Gw+hxTjT6zsJm6U4Q4Lq3s8ZhjKUZv6xU6dmwUkzojK6vjg/bOzY9d7Vtl1TKa3IHbWljlPg=="--}}
    {{--          crossorigin="anonymous" referrerpolicy="no-referrer"/>--}}

    {{--    <script src="/js/bootstrap.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
</head>
<link href="/css/starter-template.css" rel="stylesheet">
<link href="/css/mycss.css" rel="stylesheet">


<body>

<header>
    <div class="container-fluid text-center">
        <div class="row align-items-center">
            <div class="col-3 logo">
            </div>
            <div class="col">
                <div style="margin-bottom:15px ;">
                    <form class="d-flex" role="search">
                        <i class="fa-solid fa-magnifying-glass"
                           style="font-size: 20px; margin-top: 10px; margin-right:7px"></i>
                        <input class="form-control me-2" type="search" placeholder="Поиск товара" aria-label="Search">
                    </form>
                </div>
            </div>
            <div class="col-5">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarScroll"
                            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                            style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href={{route('main.index')}}>Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products.index')}}">Все товары</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('categories.index')}}">Категории</a>
                            </li>

                            @if ($isAdmin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.categories.index')}}"><i class="fa-solid fa-user"></i></a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.orders.index')}}">Мои заказы</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-user"></i></a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <button type="button" class="btn btn-transparent" id="openBasketModal">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('login')}}" class="btn btn-transparent" id="openBasketModal">

                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


<!-- Модальное окно -->
<div class="modal fade" id="basketModal" tabindex="-1" role="dialog" aria-labelledby="basketModalLabel">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content" style="margin-top: 200px">

            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="products_body">
                    <!-- Содержимое корзины будет  здесь через форич аякс -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeBasketModal">Закрыть
                </button>
                <a href="{{ route('order.index') }}" class="btn btn-primary">Оформить заказ</a>

            </div>
        </div>
    </div>
</div>

</header>


@yield('content')


<footer class="container-fluid footerr ">
    <div class="row ">
        <div class="col-3">
            <img src="storage/logo.svg" alt="" style="margin-top: 10px;margin-left: 20px;">
            <p class="footer-desc">Каждый продукт Biothal представляет собой настоящий эликсир красоты и молодости,
                концентрат морской
                силы, который работает в абсолютной синергии с кожей и соответствует самым высоким мировым
                стандартам.</p>
        </div>
        <div class="col-3">
            <h5 class="h5desc">Клиентский сервис
            </h5>
            <ul>
                <a href="">
                    <li class="footer-info">- Оплата и доставка</li>
                </a>
                <a href="">
                    <li class="footer-info">- Контакты</li>
                </a>
                <a href="">
                    <li class="footer-info">- Пользовательское соглашение</li>
                </a>
                <a href="">
                    <li class="footer-info">- Обмен и возврат</li>
                </a>
                <a href="">
                    <li class="footer-info">- Сертификаты</li>
                </a>
            </ul>
        </div>
        <div class="col-2">
            <h5 class="h5desc">О нас
            </h5>
            <ul>
                <a href="">
                    <li class="footer-info">- Оплата и доставка</li>
                </a>
                <a href="">
                    <li class="footer-info">- Философия бренда</li>
                </a>
                <a href="">
                    <li class="footer-info">- Brand</li>
                </a>

        </div>
        <div class="col-4 " style="margin-top: 15px;">


            <ul class="wrapper ">
                <li class="icon facebook ">
                    <span class="tooltip">facebook</span>
                    <span><i class="fab fa-facebook"></i> </span>

                </li>
                <li class="icon twitter">
                    <span class="tooltip"> twitter</span>
                    <span> <i class="fa-brands fa-twitter"></i></span>

                </li>
                <li class="icon instagram">
                    <span class="tooltip">instagram </span>
                    <span> <i class="fa-brands fa-instagram"></i></span>

                </li>

                <li class="icon youtume">
                    <span class="tooltip">Youtube</span>
                    <span> <i class="fa-brands fa-youtube"></i></span>

                </li>
            </ul>
        </div>
    </div>


</footer>

<script src="https://kit.fontawesome.com/369b1a3a40.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{ asset('js/basket.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"

        crossorigin="anonymous"></script>

<script>


    @yield('script')

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"--}}
    {{--        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="--}}
    {{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    {{--<script src="../../../../../Users/simac/OneDrive/Рабочий%20стол/Верста%20интернет%20магазина/js.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"--}}
    {{--        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"--}}
    {{--        crossorigin="anonymous"></script>--}}

    </body>

    </html>
