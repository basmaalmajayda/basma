<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Coupon;
use App\AppUser;
use App\OrderMeal;
use App\OrderProduct;
use App\Address;
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
        $orders = Order::with('orderMeals')->with('orderProducts')->with('user')->with('coupon')->with('address')->with('status')->select('*')->withTrashed()->paginate(10);
        return view('admin.orders.index')->with('orders', $orders);
    }

    public function getUserOrders($userId)
    {
        $userOrders = Order::select('*')->where('user_id', $userId)->get();
        if(count($userOrders) === 0){
            return response([
                'message' => 'There is no orders',
            ], 204);
        }else{
            return response([
                'message' => 'There are orders',
                'userOrders' => $userOrders,
            ], 204);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request data
        $attrs = $request->validate([
            'user_id' => 'required|integer|min:1',
            'address_id' => 'sometimes|integer|min:1',
            'payment' => 'required|string',
            'coupon_code' => 'sometimes|string',
            'time_from' => 'required|date_format:Y-m-d H:i:s',
            'time_to' => 'required|date_format:Y-m-d H:i:s',
            'address' => 'sometimes|array',
            'address.name' => 'required_with:address|string',
            'address.city' => 'required_with:address|string',
            'address.street' => 'required_with:address|string',
            'address.description' => 'required_with:address|string',
            'address.phone' => 'required_with:address|string',
            'items' => 'required|array',
            'items.*.item_id' => 'required|integer|min:1',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0.01',
        ]);

        // Store the order in orders table
        $order = new order;
        
        $total_price = $this->calculateTotalPrice($attrs['items']) + 5; // 5₪ for delivery
        $order->total_price = $total_price;

        $couponValue = 0;
        if($request->has('coupon_code')){
        $coupon = Coupon::select('*')->where('code', $attrs['coupon_code'])->first();
            if($coupon != null){
                $couponValue = $coupon->value;
                $order->final_price = $total_price * couponValue / 100;
                $order->coupon_id = $coupon->id;
            }else{
                $order->final_price = $total_price;
            }
        }

        if($request->has('address')){
            // Create a new address
            $address = new Address();
            $address->name = $attrs['address']['name'];
            $address->user_id = $attrs['address']['user_id'];
            $address->city = $attrs['address']['city'];
            $address->street = $attrs['address']['street'];
            $address->description = $attrs['address']['description'];
            $address->phone = $attrs['address']['phone'];
            $address->save();
            $order->address_id = $address->id;
        }
        
        if($request->has('address_id')){
            $order->address_id = $attrs['address_id'];
        }

        $order->user_id = $attrs['user_id'];
        $order->payment = $attrs['payment'];
        $order->time_from = $attrs['time_from'];
        $order->time_to = $attrs['time_to'];
        $order->save();

        // Store the order items (meals and products) in their respective tables
        foreach ($attes['items'] as $item) {
            if ($item['type'] === 'meal') {
                // Store meal in the meals table
                $meal = new OrderMeal;
                $meal->meal_id = $item['item_id'];
                $meal->quantity = $item['quantity'];
                $meal->order_id = $order->id;
                $meal->save();
            } elseif ($item['type'] === 'product') {
                // Store product in the products table
                $prduct = new OrderProduct;
                $prduct->product_id = $item['item_id'];
                $prduct->quantity = $item['quantity'];
                $prduct->order_id = $order->id;
                $prduct->save();
            }
        }

        return response([
            'message' => 'Order submited.',
            'order' => $order,
        ], 200);
    }

    private function calculateTotalPrice($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
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
        $order = Order::with('orderMeals')->with('orderProducts')->with('user')->with('coupon')->with('address')->select('*')->where('id', $id)->first();
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

