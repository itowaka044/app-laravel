@extends('product.layouts.product-layout')

@section('title', "create product")

@section('content')

    <form method="POST" action="/products/insert">

        @csrf

        <p>Nome:</p>
        <input type="text" id="name" name="name" value='{{ old('name') }}' required>

        <p>Preço:</p>
        <input type="number" id="price" name="price" value='{{ old('price') }}' required>

        <p>Quantidade:</p>
        <input type="number" id="quantity" name="quantity" value='{{ old('quantity') }}' required>
        <br>

        <button style="border: 1px solid black; padding: 3px; margin-top:3px" type="submit">Cadastrar</button>
    </form>


@endsection