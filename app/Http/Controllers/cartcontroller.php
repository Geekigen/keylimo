<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class cartcontroller extends Controller
{
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('layouts/cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id]= [
                "name" => $product->name,
                "id"=>$product->id,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image1,
                "seller"=>$product->user_id
            ];
        }

        session()->put('cart', $cart);
        return Redirect::back();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', __('Cart updated successfully'));
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', __('Product removed successfully'));
        }
    }

    public function wishlist(Request $request)
    {

        $data = $request->session()->all();
        foreach ($data['cart'] as $cart) {
$orders=new wishlist();
$orders->name=$cart['name'];
$orders->product_id=$cart['id'];
$orders->price=$cart['price'];
$orders->quantity=$cart['quantity'];
$orders->image=$cart['image'];
$orders->buyer=Auth::user()->id;
$orders->save();
}
return view('layouts.checkout');
}


public function order(Request $request)
{
    $this->validate($request, [
        'location'=>'Required|string',
        'number' =>'Required| min:10|max:13'
        ]);

    $data = $request->session()->all();
    foreach ($data['cart'] as $cart) {
$orders=new order();
$orders->name=$cart['name'];
$orders->product_id=$cart['id'];
$orders->price=$cart['price'];
$orders->quantity=$cart['quantity'];
$orders->image=$cart['image'];
$orders->buyer=Auth::user()->id;
$orders->seller=$cart['seller'];
}

$orders->location=$request->input('location');
$orders->number=$request->input('number');
$orders->save();
$request->session()->forget('cart');
return redirect('/')->with('status',__('Thank you for your purchase'));
}
}


