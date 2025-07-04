@extends('product.layouts.product-layout')

@section('title', "teste titulo")

@section('content')

    @include('components.alert')

    <a style="color:blue;" href="{{ route('products.create') }}">Adicionar novo produto</a>
    <br><br>

    <p> Catalogo: </p>
    <br>

    @forelse ($products as $product)

    <p>Id: {{$product->id}}</p>

    <p>Nome: </p>

    <form action="/products/edit-name/{{ $product->id }}" method="POST">

        @method('patch')

        @csrf

        <input type="text" name="name" id="name" value="{{ $product->name }}">
        <button type="submit" style="padding: 5px;border: black 1px solid">Alterar nome</button>

    </form>

    <p>Preço: </p>

    <form action="/products/edit-price/{{ $product->id }}" method="POST">

        @method('patch')

        @csrf

        <input type="number" name="price" id="price" value="{{ $product->price }}">
        <button type="submit" style="padding: 5px;border: black 1px solid">Alterar valor</button>

    </form>

    <p>Quantidade: </p>

    <form action="/products/edit-quantity/{{ $product->id }}" method="POST">

        @method('patch')

        @csrf

        <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">
        <button type="submit" style="padding: 5px;border: black 1px solid">Alterar quatidade</button>

    </form>

    <form action="/products/delete/{{ $product->id }}" method="POST">

        @method('delete')

        @csrf

        {{-- <input type="hidden" name="id" id="id" value="{{ $product->id }}"> --}}
        <button type="submit" style="padding: 5px;border: red 1px solid; margin-top:3px; margin-bottom:3px;">Excluir produto</button>

    </form>

    <a style="color:blue;" href="{{ route('products.edit', $product->id) }}">Editar produto</a>
    <br>
    <br>

    @empty

    <p>catalogo de produtos vazio</p>
    <br>

    @endforelse

    {{ $products->links() }}

    

@endsection