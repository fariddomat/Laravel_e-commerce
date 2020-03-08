<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    
    public function pay()
    {
        Cart::destroy();
        
        Session::flash('success','Pay Succssfully');
        return redirect()->route('index');

    }
}
