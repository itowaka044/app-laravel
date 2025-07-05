@extends('product.layouts.product-layout')

@section('title', "Catálogo de Produtos") {{-- Título mais descritivo --}}

@section('content')

    @include('components.alert')

    <a style="color:blue;" href="{{ route('products.create') }}">Adicionar novo produto</a>
    <br><br>

    <h2>Catálogo de Produtos</h2> {{-- Usando um cabeçalho HTML sem <p> --}}
    <br>

    <div class="table-responsive"> {{-- Adicionado div para responsividade, se necessário --}}
        <table class="table-products">
            <thead> {{-- Boa prática usar thead para cabeçalhos da tabela --}}
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody> {{-- Boa prática usar tbody para o corpo da tabela --}}
                @forelse ($products as $product)
                
                    <tr>
                        <td>
                            <form action="/products/edit-name/{{ $product->id }}" method="POST">
                                @method('patch')
                                @csrf
                                <input type="text" name="name" id="name" value="{{ $product->name }}">
                                <button type="submit" style="padding: 5px;border: black 1px solid">Alterar nome</button>
                            </form>
                        </td>
                        <td>
                            <form action="/products/edit-price/{{ $product->id }}" method="POST">
                                @method('patch')
                                @csrf
                                <input class="input-number" type="number" name="price" id="price" value="{{ $product->price }}">
                                <button type="submit" style="padding: 5px;border: black 1px solid">Alterar valor</button>
                            </form>
                        </td>
                        <td>
                            <form action="/products/edit-quantity/{{ $product->id }}" method="POST">
                                @method('patch')
                                @csrf
                                <input class="input-number" type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">
                                <button type="submit" style="padding: 5px;border: black 1px solid">Alterar quantidade</button>
                            </form>
                        </td>
                        <td>
                            @can('is_admin')
                                <form action="/products/delete/{{ $product->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" style="padding: 5px;border: red 1px solid; margin-top:3px; margin-bottom:3px;">Excluir produto</button>
                                </form>
                            @endcan
                            <a style="color:yellow;font-size: 16px" href="{{ route('products.edit', $product->id) }}">Editar produto</a>
                        </td>
                    </tr>
                
                @empty
                    <tr> {{-- Se o catálogo estiver vazio, mostre a mensagem dentro de uma linha da tabela --}}
                        <td colspan="4">Catálogo de produtos vazio.</td> {{-- colspan="4" para ocupar todas as colunas --}}
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div> {{-- Fechando .table-responsive --}}

    {{ $products->links() }}

@endsection