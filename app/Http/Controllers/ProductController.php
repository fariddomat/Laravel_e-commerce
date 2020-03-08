<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->paginate(5);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'desc'=>'required',
        ]);

        $request_data=$request->except(['img']);
        
        if($request->img){
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
        
            Image::make($request->img)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/product_images/'.$request->img->hashName()));

        $request_data['img']=$request->img->hashName();
        }
        Product::create($request_data);
        Session::flash('success','Product Created Succssfully');
        return redirect()->route('products.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('products.edit',compact('product'));
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
        $product=Product::find($id);
        
        
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'desc'=>'required',
        ]);

        $request_data=$request->except(['img']);
        
        if($request->img){
            if($product->img != 'default.png'){
                Storage::disk('public_uploads')->delete('product_images/'.$product->img);
            }
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
        
            Image::make($request->img)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/product_images/'.$request->img->hashName()));

        $request_data['img']=$request->img->hashName();
        }
        $product->update($request_data);

        Session::flash('success','Product Updated Succssfully');
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        // dd($product);
        if($product->img != 'default.png'){
            Storage::disk('public_uploads')->delete('product_images/'.$product->img);
        }
      $product->delete();
    
      Session::flash('success','Product Deleted Succssfully');
      return redirect()->route('products.index');
    }
}
