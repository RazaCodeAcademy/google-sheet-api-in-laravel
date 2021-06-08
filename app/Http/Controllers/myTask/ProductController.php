<?php

namespace App\Http\Controllers\myTask;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('firstTask.pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('firstTask.pages.products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->title = $request->title;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->qty = $request->qty;

        $product->save();

        return redirect()->route('products');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('firstTask.pages.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('firstTask.pages.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->qty = $request->qty;

        $product->update();

        return redirect()->route('products');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products');
    }
}
