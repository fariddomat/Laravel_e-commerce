<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use Cart;
use Session;
class ShoppingController extends Controller
{
    

    public function add_to_cart(Request $request)
    {
        $product=Product::find($request->product_id);
        
        $cartItem = Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>$request->qty,
            'price'=>$product->price,
            'weight'=>'0'

        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
// dd(Cart::content());
        Session::flash('success','Product Add to cart Succssfully');
        return redirect()->route('cart');
    }
    public function cart()
    {
        // Cart::destroy();

        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        Session::flash('success','Delete Product from cart Succssfully');
        return redirect()->back();
    }

    public function incr($id, $qty)
    {
        Cart::update($id, $qty + 1);
        Session::flash('success','Increase Succssfully');
        return redirect()->back();
    }
    
    public function decr($id, $qty)
    {
        Cart::update($id, $qty - 1);
        Session::flash('success','Decrease Succssfully');
        return redirect()->back();
    }

    public function rapid_add($id)
    {
        $product=Product::find($id);
        
        $cartItem = Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$product->price,
            'weight'=>'0'

        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
// dd(Cart::content());
        Session::flash('success','Product Add to cart Succssfully');
        return redirect()->back();
    }

}
