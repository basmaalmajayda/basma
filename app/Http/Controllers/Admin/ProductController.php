<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\MedicalCase;
use App\ProductCase;
use App\Color;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productCategory')->with('case')->select('*')->withTrashed()->paginate(10);
        return view('admin.products.index')->with('products', $products);
    }

    public function getAllProducts()
    {
        $products = Product::all();
        return response([
            'message' => 'There are products',
            'allProducts' => $products,
        ], 200);
    }

    public function getProductsOfCategory($cat_id){
        $products = Product::select('*')->where('cat_id', $cat_id)->get();
        return response([
            'message' => 'There are products in this category',
            'productsOfCategory' => $products,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::select('*')->get();
        $cases = MedicalCase::select('*')->get();
        $colors = Color::select('*')->get();
        return view('admin.products.create')->with(['categories' => $categories, 'cases' => $cases, 'colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
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
        if($request->color_id != -1){
            $product->color_id = $request->color_id;
        }
        $product->price = $request->price;
	    $status = $product->save();

        $selectedCases = $request->input('case_id', []); // Retrieve the selected cases as an array
        // Access each selected case ID
        foreach ($selectedCases as $caseId) {
            $productCase = new ProductCase;
            $productCase->product_id = $product->id;
            $productCase->case_id = $caseId;
            $productCase->save();
        }
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
        $product = Product::select('*')->withTrashed()->where('id', $id)->first();
        return view('admin.products.details')->with('product' , $product); 
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
        $cases = MedicalCase::select('*')->get();
        $productCases = ProductCase::select('*')->where('product_id', $id)->get();
        $colors = Color::select('*')->get();
        return view('admin.products.edit')->with(['product' => $product,'categories' => $categories, 'cases' => $cases, 'productCases' => $productCases, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
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
        if($request->color_id != -1){
            $product->color_id = $request->color_id;
        }
        $product->price = $request->price;
    	$status = $product->save();

        $selectedCases = $request->input('case_id', []); // Retrieve the selected cases as an array
        // Access each selected case ID
        foreach ($selectedCases as $caseId) {
            $productCase = new ProductCase;
            $productCase->product_id = $product->id;
            $productCase->case_id = $caseId;
            $productCase->save();
        }
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
