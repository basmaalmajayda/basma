<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::select('*')->withTrashed()->paginate(10);
        return view('admin.coupons.index')->with('coupons', $coupons);
    }

    public function getAllCoupons()
    {
        $coupons = Coupon::all();
        if(count($coupons) == 0){
            return response([
                'message' => 'There is no coupons',
            ], 204);  
        }
        return response([
            'message' => 'There are coupons',
            'coupons' => $coupons,
        ], 200);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('coupon_images'), $filename);
		$coupon->img = 'coupon_images/' . $filename;
    	$coupon->cade = $request->code;
    	$coupon->value = $request->value;
	    $status = $coupon->save();
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
        $coupon = Coupon::select('*')->where('id', $id)->first();
        return view('admin.coupons.edit')->with('coupon', $coupon);
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
        $coupon = Coupon::find($request->id);
		unlink(public_path( $coupon->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('coupon_images'), $filename);
		$coupon->img = 'coupon_images/' . $filename;
        $coupon->code = $request->code;
    	$coupon->value = $request->value;
    	$status = $coupon->save();
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
        Coupon::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Coupon::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}
