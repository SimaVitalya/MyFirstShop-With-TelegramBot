@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="sidebar col-2">
                <h1>Explore</h1>

                <ul>
                    <li class="d-flex">
                        <img src="storage/молния.svg" alt="" style=" padding-right: 10px;">
                        <a class="left" href="">New In</a>
                    </li>
                    <li class="d-flex">
                        <img src="storage/пальто.svg" alt="" style="padding-right: 10px ">
                        <a class="left" href="">Clothing</a>
                    </li>
                    <li class="d-flex">
                        <img src="storage/ботинок.svg" alt="" style="padding-right: 13px">
                        <a class="left" href="">Shoes</a>
                    </li>
                    <li class="d-flex">
                        <img src="storage/порфель.svg" alt="" style=" padding-right: 10px">
                        <a class="left" href="">Accessories</a>
                    </li>
                    <li class="d-flex">
                        <img src="storage/девка.svg" alt="" style=" padding-right: 7px">
                        <a class="left" href="">Activewear</a>
                    </li>
                    <li class="d-flex">
                        <img src="storage/подарок.svg" alt="" style=" padding-right: 5px">
                        <a class="left" href="">Gifts & Living</a>
                    </li>
                    <li class="d-flex">
                        <img src="storage/камень.svg" alt="">
                        <a class="left" href="">Inspiration</a>
                    </li>
                    <li class="d-flex">
                        <img class="storage/message.svg" alt="">
                        <a href="">
                            <h4>Задать вопрос</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="posts col-5">
                <div>
                    <div>
                        <div class="d-flex flex-wrap">

                            <div style="position: relative;">
                                <img src="storage/картинка.jpg" alt="Картинка" class="image-main-content-mini">
                                <h1 class="titleInImg "
                                    style="position: absolute; top: 40%; left: 25%; transform: translate(-50%, -50%);">
                                    Trending & Hot</h1>
                                <p class="descInImg"
                                   style="position: absolute; top: 60%; left: 30%; transform: translate(-50%, -50%);">
                                    A connection of most trendint items.</p>
                            </div>
                            <div style="position: relative;">
                                <img src="storage/длинная.jpg" alt="Картинка" class="image-main-content-mini">
                                <h1 class="titleInImg "
                                    style="position: absolute; top: 40%; left: 25%; transform: translate(-50%, -50%);">
                                    Trending & Hot</h1>
                                <p class="descInImg"
                                   style="position: absolute; top: 60%; left: 30%; transform: translate(-50%, -50%);">
                                    A connection of most trendint items.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div style="position: relative;">

                            <img class="image-main-content" src="storage/mainImg.png" alt="">
                            <img class="image-heart" src="storage/heart.svg" alt=""
                                 style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
                        </div>
                        <div style="position: relative;">

                            <img class="image-main-content" src="storage/mainImg.png" alt="">
                            <img class="image-heart" src="storage/heart.svg" alt=""
                                 style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
                        </div>

                    </div>
                </div>


            </div>
            <div class="posts col-5">
                <div>
                    <div class="d-flex">
                        <div style="position: relative;">

                            <img class="image-main-content" src="storage/Кот.jpg" alt="">
                            <img class="image-heart" src="storage/heart.svg" alt=""
                                 style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
                        </div>
                        <div style="position: relative;">

                            <img class="image-main-content" src="storage/10.jpg" alt="">
                            <img class="image-heart" src="storage/heart.svg" alt=""
                                 style="position: absolute; top: 12%; left: 80%; transform: translate(-50%, -50%);">
                        </div>

                    </div>
                    <div>
                        <div class="d-flex flex-wrap">
                            <div style="position: relative;">
                                <img src="storage/картинка.jpg" alt="Картинка" class="image-main-content-mini">
                                <h1 class="titleInImg "
                                    style="position: absolute; top: 40%; left: 25%; transform: translate(-50%, -50%);">
                                    Trending & Hot</h1>
                                <p class="descInImg"
                                   style="position: absolute; top: 60%; left: 30%; transform: translate(-50%, -50%);">
                                    A connection of most trendint items.</p>
                            </div>
                            <div style="position: relative;">
                                <img src="storage/длинная.jpg" alt="Картинка" class="image-main-content-mini">
                                <h1 class="titleInImg "
                                    style="position: absolute; top: 40%; left: 25%; transform: translate(-50%, -50%);">
                                    Trending & Hot</h1>
                                <p class="descInImg"
                                   style="position: absolute; top: 60%; left: 30%; transform: translate(-50%, -50%);">
                                    A connection of most trendint items.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
