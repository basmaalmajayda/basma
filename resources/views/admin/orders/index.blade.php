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
                                        <td>{{$order->price}}$</td>
                                        <td>{{$order->coupon['value']}}%</td>
                                        <td>
                                              <button type="submit" class="btn btn-warning btn-sm">{{$order->status}}</button>
                                        </td>
                                        <th scope="row">
                                        <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/orderDetails/' . $order->id )}}" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
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