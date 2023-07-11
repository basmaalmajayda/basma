
@extends('layouts.main')

@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Details Of Order Number <b>{{$order->id}}</b></h1>
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Information</h6>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fas fa-user me-2"></i>{{$order->user['name']}}</figure>
                            </div>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fas fa-phone me-2"></i>{{$order->address['phone']}}</figure>
                            </div>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fas fa-map-marked me-2"></i>
                                    {{$order->address['city']}} {{$order->address['street']}} {{$order->address['description']}}
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4 ">
                            <h6 class="mb-4">Order Information</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Order No</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Coupon Value</th>
                                        <th scope="col">Final Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$order->id}}</td>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(!$order->orderMeals->isEmpty() || !$order->orderProducts->isEmpty())
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Order Items</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderMeals as $meal)
                                    <tr>
                                        <td><img src= "{{ asset($meal->meal['img']) }}" width="70" height="70" alt=""></td>
                                        <td>{{$meal->meal['name']}}</td>
                                        <td>{{$meal->quantity}}</td>
                                        <td>{{$meal->meal['price']}} ₪</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/mealDetails/' . $meal->meal['id'] )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @foreach($order->orderProducts as $product)
                                    <tr>
                                        <td><img src= "{{ asset($product->product['img']) }}" width="70" height="70" alt=""></td>
                                        <td>{{$product->product['name']}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->product['price']}} ₪</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/productDetails/' . $product->product['id'] )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                <tbody>  
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
           
@endsection