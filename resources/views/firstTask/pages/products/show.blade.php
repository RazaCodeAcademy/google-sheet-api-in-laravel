@extends('firstTask.layouts.master')

@section('title', 'Products')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Product</h2>
        <table class="table table-stripped w-100">
            <head>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Action</th>
            </head>
            <tbody>
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>
                        <a href="{{ route('editProduct', $product->id) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection