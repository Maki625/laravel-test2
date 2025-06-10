@extends('layouts.app')

@section('content')

<link href="{{ asset('css/show.css') }}" rel="stylesheet">

<div class="container">

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >
  @csrf

<!-- 商品名 -->
<div class="form-group">
                <label>商品名 </label>
                <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
            <p class="error-message">
          @error('name')
          {{ $message }}
          @enderror
        </p>
</div>

<!-- 値段 -->
<div class="form-group">
                <label>値段</label>
                <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
            <div><p class="error-message">
          @error('price')
          {{ $message }}
          @enderror
        </p></div>
</div>

<!-- 商品画像 -->
<div class="form-group">
  <label>商品画像</label>
  <img id="imagePreview" alt="画像プレビュー" class="preview-img">

  <input type="file" name="image">


<!-- 季節 -->
  <div class="form-group">
                <label>季節</label>
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
    <label>商品説明</label>
    <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
    <p class="error-message">
          @error('description')
          {{ $message }}
          @enderror
    </p>
</div>

    <!-- 商品変更ボタン -->
    <div class="button-wrapper">
    <button type="submit" name="return" class="return-btn" value="back">戻る</button>

    <button type="submit" name="store" class="store-btn" value="store">変更を保存
    </button>

    <button type="submit" name="delete" class="delete-btn" value="destroy">ゴミ箱UIつける</button>
    </div>
</div>

</form>

<script>
  const input = document.querySelector('input[type="file"]');
  const preview = document.getElementById('imagePreview');

  input.addEventListener('change', () => {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => {
        preview.src = reader.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  });
</script>

@endsection