<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('food')->with('discount')->select('*')->withTrashed()->paginate(10);
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('product_images'), $filename);
		$product->img = 'product_images/' . $filename;
        $alternative->name = $request->name;
        $alternative->rate = $request->rate;
        $alternative->quantity = $request->quantity;
        $alternative->weight = $request->weight;
        $alternative->cat_id = $request->cat_id;
        $alternative->discount_id = $request->discount_id;
        $alternative->color = $request->color;
        $alternative->description = $request->description;
        $alternative->price = $request->price;
	    $status = $product->save();
    	return redirect()->back()->with('status', $status);
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
        $product = Product::select('*')->where('id', $id)->first();
        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request->id);
		unlink(public_path( $product->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$product->img->move(public_path('product_images'), $filename);
		$product->img = 'product_images/' . $filename;
        $alternative->name = $request->name;
        $alternative->rate = $request->rate;
        $alternative->quantity = $request->quantity;
        $alternative->weight = $request->weight;
        $alternative->cat_id = $request->cat_id;
        $alternative->discount_id = $request->discount_id;
        $alternative->color = $request->color;
        $alternative->description = $request->description;
        $alternative->price = $request->price;
    	$status = $product->save();
		return redirect()->back()->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Product::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}
