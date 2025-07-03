<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostProductRequest;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Models\Product;

class ProductController extends Controller
{


    // testando view()

    public function index(){

        $products = Product::paginate(10);

        return view('teste.teste', [
            'products' => $products
        ]);

    }



    // [ok] read all products

    public function readAllProducts(){

        $products = Product::all();

        return $products;

    }

    // [ok] create products 

    public function createProduct(){
        
        return view("product.create-product");

    }

    public function insertProduct(PostProductRequest $req){

        $product = Product::create($req->all());

        return redirect()
                ->route('teste')
                ->with('success', 'produto inserido');

        // return response()->json($product, 201);

    }

    // [ok] read product by id

    public function readProductById($id)
    {
        return Product::findOrFail($id);
    }


    // [] update product


    // [] update product price only


    // [] delete product
}
