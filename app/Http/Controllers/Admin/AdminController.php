<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Meal;
use App\User;
use App\Order;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        $unCompletedOrders = Order::select('*')->withTrashed()->where('status_id', 1)->orWhere('status_id', 2)->paginate(10);
        $completedOrders = Order::select('*')->withTrashed()->where('status_id', 3)->paginate(10);
        $countMeals = Meal::withTrashed()->count();
        $countUsers = User::count();
        $orderNo = Order::select('*')->withTrashed()->get();
        $counter = 0;
        foreach($orderNo as $order){
            $counter += $order->final_price;
        }
        $countSales = $counter;
        $countOrders = Order::withTrashed()->count();
        return view('admin.dashboard')->with(['unCompletedOrders' => $unCompletedOrders, 
            'completedOrders' => $completedOrders, 'countMeals' => $countMeals, 
            'countUsers' => $countUsers, 'countSales'=> $countSales, 
            'countOrders' => $countOrders, 'admin' => $admin]);
    }
    public function admin()
    {
        return view('admin.authentication.profile');
    }
}
