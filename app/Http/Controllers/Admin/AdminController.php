<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\AppUser;
use App\Order;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::select('*')->withTrashed()->where('status_id', 1)->orWhere('status_id', 2)->paginate(10);
        $countMeals = Meal::withTrashed()->count();
        $countUsers = AppUser::withTrashed()->count();
        $orderNo = Order::select('*')->withTrashed()->get();
        $counter = 0;
        foreach($orderNo as $order){
            $counter += $order->final_price;
        }
        $countSales = $counter;
        $countOrders = Order::withTrashed()->count();
        return view('admin.dashboard')->with(['orders' => $orders, 'countMeals' => $countMeals, 'countUsers' => $countUsers, 'countSales'=> $countSales, 'countOrders' => $countOrders]);
    }
    public function profile()
    {
        //get admin info
        return view('admin.profile.index');
        // ->with('admin', $admin);
    }
}
