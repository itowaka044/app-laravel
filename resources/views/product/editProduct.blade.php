@extends('product.layouts.product-layout')

@section('title', "edit product #" . $product->id)

@section('content')

    <br>
    <h1>Editar produto {{$product->name}} </h1>
    <br>

    <form method="POST" action="/products/edit/{{ $product->id }}">

        @method('PUT')

        @csrf

        <p>name</p>
        <input type="text" id="name" name="name" value='{{ $product->name }}' required>

        <p>price</p>
        <input type="number" id="price" name="price" value='{{ $product->price }}' required>

        <p>quantity</p>
        <input type="number" id="quantity" name="quantity" value='{{ $product->quantity }}' required>
        <br>

        <button type="submit">Enviar</button>
        
    </form>


@endsection