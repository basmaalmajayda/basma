<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Coupon;
use App\AppUser;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('orderMeals')->with('orderProducts')->with('user')->with('coupon')->select('*')->withTrashed()->paginate(10);
        return view('admin.orders.index')->with('orders', $orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new order;
    	$order->payment = $request->payment;
    	$order->user_id = $request->user_id;
        if($request->code != null){
        $coupon = Coupon::select('*')->where('code', $request->code)->first();
        }
        if($coupon->id != null){
    	$order->coupon_id = $coupon->id;
        }
	    $status = $order->save();
    	return redirect()->back()->with('status', $status);
    }

    public function updateOrderStatus($id)
    {
        $order = Order::find($id);
        if($order->status_id == 1){
            $order->status_id = 2;
        }else if($order->status_id == 2){
            $order->status_id = 3;
        }else if($order->status_id == 3){
            $order->status_id = 3;
        }
    	$status = $order->save();
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
        $order = Order::with('orderMeals')->with('orderProducts')->with('user')->with('coupon')->select('*')->where('id', $id)->first();
        return view('admin.orders.details')->with('order' , $order); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Order::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

