@extends('layouts.main')

@section('content')
        <!-- Sale & Revenue End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Meals</p>
                                <h6 class="mb-0">{{$countMeals}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Users</p>
                                <h6 class="mb-0">{{$countUsers}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">{{$countSales}}$</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orders</p>
                                <h6 class="mb-0">{{$countOrders}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Sale & Revenue End -->
            <div class="container-fluid pt-4 px-4"> 
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Uncompleted Orders</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Coupon Value</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->user['name']}}</td>
                                        <td>{{$order->payment}}</td>
                                        <td>{{$order->total_price}}$</td>
                                        @if(@empty($order->coupon['value']))
                                        <td>-</td>
                                        @else
                                        <td>{{$order->coupon['value']}}%</td>
                                        @endif
                                        <td>
                                            <a href="{{URL::to('/foody/updateOrderStatus/' . $order->id )}}" class="{{$order->status['btn_class']}}">{{$order->status['status']}}</a> 
                                        </td>
                                        <th scope="row">
                                        <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/orderDetails/' . $order->id )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                @if(@empty($order->deleted_at))
                                                <a href="{{URL::to('/foody/deleteOrder/' . $order->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreOrder/' . $order->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
                                                @endif
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