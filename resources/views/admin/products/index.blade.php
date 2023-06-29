@extends('layouts.main')

@section('content')

<!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">   
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createProduct')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add Product
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Products</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Discount Value</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td><img src="{{ asset($product->food['img']) }}" width="70" height="70" alt=""></td>
                                        <td>{{$product->food['name']}}</td>
                                        <td>{{$product->food['description']}}</td>
                                        @if(@empty($product->rate))
                                        <td>-</td>
                                        @else
                                        <td>{{$product->rate}}</td>
                                        @endif
                                        <td>{{$product->weight}}</td>
                                        <td>{{$product->price}}$</td>
                                        <td>{{$product->discount['discount_value']}}%</td>
                                        <td>{{$product->quantity}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editProduct/' . $product->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($product->deleted_at))
                                                <a href="{{URL::to('/foody/deleteProduct/' . $product->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreProduct/' . $product->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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