@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Welcome !</h1>
            <h1>Add New Product</h1>
            <a href="{{ route('adminproduct.create') }}" class="btn btn-sm btn-primary">Add New</a>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->price }}</p>
                        <a href="{{ route('product.show',['product'=>$product->id]) }}">
                            <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                        </a>
                        {{-- <a href="{{ route('adminproduct.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <form action="{{ route('adminproduct.destroy',['product'=>$product->id]) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> 
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" id="id"
                                    value="{{ $product->id }}">
                                <input type="submit" value="Add to Cart" class="btn btn-sm btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
@endsection