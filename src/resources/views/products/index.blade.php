@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>検索 </h1>
    @foreach($products as $product)
    <p>{{ $product->name }}</p>
    @endforeach
</body>
</html>

@endsection