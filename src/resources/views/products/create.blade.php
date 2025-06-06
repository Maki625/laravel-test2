@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create.css') }}" rel="stylesheet">

<body>
    <div class="container">
        <h2 class="page-title">商品登録</h2>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <!-- 商品名 -->
            <div class="form-group">
                <label>商品名 <span class="required">必須</span></label>
                <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
            <p class="error-message">
          @error('name')
          {{ $message }}
          @enderror
        </p>
</div>

<!-- 値段 -->
<div class="form-group">
                <label>値段 <span class="required">必須</span></label>
                <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
            <div><p class="error-message">
          @error('price')
          {{ $message }}
          @enderror
        </p></div>
</div>

<!-- 商品画像 -->


            <!-- 季節 -->
            <div class="form-group">
                <label>季節 <span class="required">必須</span> <span class="required-message">複数選択可</span></label>
                <div class="season-inputs">
                    <label><input type="radio" name="season" value="1" {{ old('season') === '1' ? 'checked' : '' }}> 春</label>
                    <label><input type="radio" name="season" value="2" {{ old('season') === '2' ? 'checked' : '' }}> 夏</label>
                    <label><input type="radio" name="season" value="3" {{ old('season') === '3' ? 'checked' : '' }}> 秋</label>
                    <label><input type="radio" name="season" value="4" {{ old('season') === '4' ? 'checked' : '' }}> 冬</label>
                </div>
        </div>
        <p class="error-message">
          @error('season')
          {{ $message }}
          @enderror
        </p>
</div>

       <!-- 商品説明 -->
       <div class="form-group">
        <label>商品説明 <span class="required">必須</span></label>
        <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
    <p class="error-message">
          @error('description')
          {{ $message }}
          @enderror
        </p>
</div>

    <!-- 商品登録ボタン -->
    <button type="submit" name="return" class="form-btn" value="back">戻る</button>

    <button type="submit" name="send" class="form-btn" value="create">登録
    </button>

</form>


</body>

@endsection