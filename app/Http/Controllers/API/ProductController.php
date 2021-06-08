<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(
            [
                'products' => $products
            ]
        , 200);
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->title = $request->title;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->qty = $request->qty;

        $product->save();

        return response()->json(
            [
                'product' => $product
            ]
        , 200);
    }

    public function show(Request $request)
    {
        $product = Product::find($request->id);

        return response()->json(
            [
                'product' => $product
            ]
        , 200);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);

        if ($product) {
            $product->title = $request->title;

            $product->description = $request->description;

            $product->price = $request->price;

            $product->qty = $request->qty;

            $product->update();

            return response()->json(
                [
                    'product' => $product
                ]
            , 200);
        }

        return response()->json(
            [
                'message' => 'Something went wrong'
            ]
        , 200);
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);

        $product->delete();

        return response()->json(
            [
                'message' => 'Product successfuly deleted!'
            ]
        , 200);
    }
}
