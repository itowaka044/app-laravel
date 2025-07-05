<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostProductRequest;
use App\Http\Requests\PutProductRequest;
use App\Http\Requests\PatchProductRequest;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{

    // /index
    public function index(){

        $products = Product::paginate(10);

        return view('product.index', [

            'products' => $products

        ]);

    }

    // /products
    public function readAllProducts(){

        $products = Product::all();

        return $products;

    }

    // /products/create
    public function createProduct(){
        
        return view("product.createProduct");

    }
    
    // /products/insert
    public function insertProduct(PostProductRequest $req){

        $product = Product::create($req->validated());

        return redirect()
        ->route('index')
        ->with('success', 'Produto inserido');

        // return response()->json($product, 201);

    }

    // /products/{id}
    public function readProductById($id){

        $product = Product::find($id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');
        
        }

        return $product;

    }

    // /products/edit/{id}
    public function editProduct($id){

        $product = Product::find($id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');

        }

        return view('product.editProduct', [

            'product' => $product
    
        ]);

    }

    // /products/edit/{id}
    public function updateProduct(PutProductRequest $req){
        
        $product = Product::find($req->id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');

        }

        $product->update($req->validated());

        return redirect()
        ->route('index')
        ->with('success', 'Produto atualizado');

    }

    // /products/edit-name/{id}
    public function updateProductName(PatchProductRequest $req){

        $product = Product::find($req->id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');

        }

        $product->name = $req->name;

        $product->save();

        return redirect()
        ->route('index')
        ->with('success', 'Nome do produto ID: '. $product->id .' atualizado');

    }

    // /products/edit-price/{id}
    public function updateProductPrice(PatchProductRequest $req){

        $product = Product::find($req->id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');

        }

        $product->price = $req->price;

        $product->save();

        return redirect()
        ->route('index')
        ->with('success', 'Preço do produto ID: '. $product->id .' atualizado');

    }

    // /products/edit-quantity/{id}
    public function updateProductQuantity(PatchProductRequest $req){

        $product = Product::find($req->id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');

        }

        $product->quantity = $req->quantity;

        $product->save();

        return redirect()
        ->route('index')
        ->with('success', 'Quantidade do produto ID: '. $product->id .' atualizado');

    }

    // /products/delete/{id}
    public function deleteProduct($id){

        if(Gate::denies('is_admin')){

            return redirect()
            ->route('index')
            ->with('error', 'You should not pass!!!');
        }

        $product = Product::find($id);

        if($product == null){

            return redirect()
            ->route('index')
            ->with('error', 'Produto não encontrado');

        }

        $product->delete();

        return redirect()
        ->route('index')
        ->with('success', 'Produto ID: '. $id .' deletado');

    }
}
