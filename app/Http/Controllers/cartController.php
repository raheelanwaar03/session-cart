<?php

namespace App\Http\Controllers;

use App\Models\adminproduct;
use App\Models\product;
use Illuminate\Http\Request;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get cart session products
        $cartProducts = session()->get('cart');
        if ($cartProducts == null) {
            $cartProducts = [];
        }
        $products = adminproduct::whereIn('id', $cartProducts)->get();
        return view('cart.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        // storing product id in session
        $request->session()->push('cart',$validatedData['id']);
        return redirect()->route('cart.index')->with('success','Product added to cart');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartProduct = session()->get('cart');
        // removing this product from session
        $cartProduct = array_diff($cartProduct, [$id]);
        session()->put('cart', $cartProduct);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }
}
