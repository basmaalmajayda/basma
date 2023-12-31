@extends('layouts.main')

@section('content')

<!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">All orders</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Orders List</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Order No</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Coupon Value</th>
                                        <th scope="col">Final Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user['name']}}</td>
                                        <td>{{$order->payment}}</td>
                                        <td>{{$order->total_price}} ₪</td>
                                        @if(@empty($order->coupon['value']))
                                        <td>-</td>
                                        @else
                                        <td>{{$order->coupon['value']}}%</td>
                                        @endif
                                        <td>{{$order->final_price}} ₪</td>
                                        <td>
                                            <a href="{{URL::to('/foody/updateOrderStatus/' . $order->id )}}" class="{{$order->status['btn_class']}}">{{$order->status['status']}}</a> 
                                        </td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/orderDetails/' . $order->id )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection

           
     


    