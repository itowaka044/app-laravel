@extends('product.layouts.product-layout')

@section('title', "teste titulo")

@section('content')

    <a href="{{ route('products.create') }}">adicionar novo produto</a>
    <br><br>

    @if (session()->has('success'))
        {{ session('success') }}
    @endif

    <p> catalogo: </p>
    <br>

    {{-- @foreach ($products as $product)

    <p>id: {{$product->id}}</p>
    <p>nome: {{$product->name}}</p>
    <p>preço: {{$product->price}}</p>
    <p>quantidade: {{$product->quantity}}</p>
    <br>
        
    @endforeach --}}


    @forelse ($products as $product)

    <p>id: {{$product->id}}</p>
    <p>nome: {{$product->name}}</p>
    <p>preço: {{$product->price}}</p>
    <p>quantidade: {{$product->quantity}}</p>
    <br>

    @empty

    <p>catalogo de produtos vazio</p>
    <br>
    @endforelse

    {{ $products->links() }}

    

@endsection