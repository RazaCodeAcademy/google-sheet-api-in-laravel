@extends('firstTask.layouts.master')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h2 class="text-center">Create Product</h2>
       <form action="{{ route('updateProduct', $product->id) }}" method="post" class="m-5">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-12 my-3">
                    <div class="form-group">
                        <label for="">Enter Title</label>
                        <input type="text" class="form-control" value="{{ $product->title ?? "" }}" name="title" placeholder="Title">
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <div class="form-group">
                        <label for="">Enter Description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Description">{{ $product->description ?? "" }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <div class="form-group">
                        <label for="">Enter Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $product->price ?? "" }}">
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <div class="form-group">
                        <label for="">Enter Qty</label>
                        <input type="number" class="form-control" name="qty" placeholder="Qty" value="{{ $product->qty ?? "" }}">
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
       </form>
        
    </div>
@endsection