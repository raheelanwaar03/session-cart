@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Product Details</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <p>Price: {{ $product->price }}</p>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" id="id"
                                    value="{{ $product->id }}">
                                <input type="submit" value="Add to Cart" class="btn btn-primary">
                            </form>
                        </div>
                </div>               
            </div>
        </div>
    </div>
@endsection