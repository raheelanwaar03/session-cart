@extends('layout.app')

@section('content')

     <div class="row">
         <div class="col-12">
             <h1>Add New Product</h1>
         </div>
     </div>
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-body">
                     <form action="{{ route('adminproduct.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                       <label for="description">Description</label>
                       <input type="text" id="description" name="description" class="form-control">
                   </div>
                   <div class="form-group">
                       <label for="price">Price</label>
                       <input type="text" id="price" name="price" class="form-control">
                   </div>
                   <div class="form-group">
                       <label for="image">Image</label>
                       <input type="file" id="image" name="image" class="form-control">
                   </div>
                   <button type="submit" class="btn btn-block btn-primary">Add</button>
                </form>
                </div>
             </div>
         </div>
     </div>

@endsection