@extends('product.layouts.product-layout')

@section('title', "create product")

@section('content')

    @if($errors->any())

        @foreach ($errors->all() as $err)
            
            <p>{{ $err }}</p>
            <br>
            
        @endforeach

    @endif


    <form method="POST" action="/products/insert">

        @csrf

        <p>name</p>
        <input type="text" id="name" name="name" value='{{ old('name') }}' required>

        <p>price</p>
        <input type="number" id="price" name="price" value='{{ old('price') }}' required>

        <p>quantity</p>
        <input type="number" id="quantity" name="quantity" value='{{ old('quantity') }}' required>
        <br>

        <button type="submit">Enviar</button>
    </form>


@endsection