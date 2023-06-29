<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\Discount;
use App\MedicalCase;
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
        $products = Product::with('productCategory')->with('discount')->select('*')->withTrashed()->paginate(10);
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::select('*')->get();
        $discounts = Discount::select('*')->get();
        $cases = MedicalCase::select('*')->get();
        return view('admin.products.create')->with(['categories' => $categories, 'discounts' => $discounts, 'cases' => $cases]);
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
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->cat_id = $request->cat_id;
        $product->discount = $request->discount;
        $product->case_id = $request->case_id;
        $product->color = $request->color;
        $product->type = $request->type;
        $product->price = $request->price;
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
        $categories = ProductCategory::select('*')->get();
        $discounts = Discount::select('*')->get();
        $cases = MedicalCase::select('*')->get();
        return view('admin.products.edit')->with(['product' => $product,'categories' => $categories, 'discounts' => $discounts, 'cases' => $cases]);
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
        unlink(public_path($product->img));
        $filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('product_images'), $filename);
		$product->img = 'product_images/' . $filename;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->cat_id = $request->cat_id;
        $product->discount = $request->discount;
        $product->case_id = $request->case_id;
        $product->color = $request->color;
        $product->type = $request->type;
        $product->price = $request->price;
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
