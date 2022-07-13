<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = $products->toArray();
        return (view('welcome', compact('products')));
    }

    /**
     * retorna un array con el producto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_details(Request $request)
    {
        $product = Product::selectRaw('products.*, sizes.size')->join('sizes', 'products.size_id', '=', 'sizes.id')
            ->where('products.id', "=", $request->product_id)
            ->first();
        if (!is_null($product)) {
            $product = $product->toArray();
            return view('details', compact('product'));
        } else {
            return view('details');
        }
    }

    /**
     * retorna una vista para modificar el producto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_product_form(Request $request)
    {
        $product = Product::selectRaw('products.*, sizes.size')->join('sizes', 'products.size_id', '=', 'sizes.id')
        ->where('products.id', "=", $request->product_id)
        ->first();
    
        if (!is_null($product)) {
            $product = $product->toArray();
            return view('update', compact('product'));
        } else {
            return view('update');
        }
    }

    /**
     * Método usado para actualizar datos en la BD
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product_fields =  $product->where('id', '=', $request->id);
        if (!is_null($product_fields->first())) {
            $product_fields->update($request->except('_token'));
            $product = $product->selectRaw('products.*, sizes.size')->join('sizes', 'products.size_id', '=', 'sizes.id')
            ->where('products.id', "=", $request->id)
            ->first();
            $message = "Producto: {$product["name"] } ha sido actualizado!";
            return view('details', compact('product','message'));
        }else{
            $message = "Producto no fue encontrado";
            return view('details', compact('message'));
        }
    }
    public function delete_product()
    {
        # code...
    }
}
