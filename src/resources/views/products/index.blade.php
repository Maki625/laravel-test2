@extends('layouts.app')

@section('content')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<body>
    <div class="wrapper">
    <div class="card">
        <div class="fruit-img">
            <img src="./image/kiwi.png" />
        </div>
        <div class="text-box">
            <span class="name">キウイ</span>
            <span class="price">¥800</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/strawberry.png" />
        </div>
        <div class="text-box">
            <span class="name">ストロベリー</span>
            <span class="price">¥1200</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/orange.png" />
        </div>
        <div class="text-box">
            <span class="name">オレンジ</span>
            <span class="price">¥850</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/watermelon.png" />
        </div>
        <div class="text-box">
            <span class="name">スイカ</span>
            <span class="price">¥700</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/peach.png" />
        </div>
        <div class="text-box">
            <span class="name">ピーチ</span>
            <span class="price">¥1000</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/muscat.png" />
        </div>
        <div class="text-box">
            <span class="name">シャインマスカット</span>
            <span class="price">¥1400</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/pineapple.png" />
        </div>
        <div class="text-box">
            <span class="name">パイナップル</span>
            <span class="price">¥800</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/grapes.png" />
        </div>
        <div class="text-box">
            <span class="name">ブドウ</span>
            <span class="price">¥1100</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/banana.png" />
        </div>
        <div class="text-box">
            <span class="name">バナナ</span>
            <span class="price">¥600</span>
        </div>
    </div>

    <div class="card">
        <div class="fruit-img">
            <img src="./image/melon.png" />
        </div>
        <div class="text-box">
            <span class="name">メロン</span>
            <span class="price">¥900</span>
        </div>
    </div>

</body>
@endsection