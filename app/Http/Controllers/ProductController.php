<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Models\Product;

class ProductController extends Controller
{


    // testando view()

    public function index(){

        return view('create');

    }



    // [ok] read all products

    public function readAllProducts(){

        $products = Product::all();

        return $products;

    }

    // [ok] create products 

    public function createProduct(Request $req){
        
        $prodReq = $req->validate(
        [ 
            'name' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ],
        [
            'name.required' => 'campo "name" obrigatório',
            'price.required' => 'campo "price" obrigatório',
            'quantity.required' => 'campo "quantity" obrigatório',
        ]);

        $product = Product::create($prodReq);

        return response()->json($product, 201);

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
