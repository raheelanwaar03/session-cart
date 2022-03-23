<?php

namespace App\Http\Controllers;

use App\Models\adminproduct;
use App\Models\product;
use Illuminate\Http\Request;

class AdminproductController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]); 

        $file = $request->file('image');
        $fileName = rand(1111,999999). '.'.  $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fileName);


        $product = new adminproduct();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->image = $fileName;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product has been added');

    }
    public function show(adminproduct $product)
    {
        // show single product
        $product = adminproduct::findOrFail($product->id);
        return view('admin.show', compact('product'));
    }

   public function destroy($id)
    {
        $product = adminproduct::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product has been deleted');
    }  
   
}
