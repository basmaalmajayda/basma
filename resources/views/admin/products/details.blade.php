
@extends('layouts.main')

@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Details Of <b>{{$product->name}}</b></h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4 ">
                            <h6 class="mb-4">Product Information</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Arabic Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Arabic Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Medical Case</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Available Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Color</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><img src= "{{ asset($product->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->name_ar}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->description_ar}}</td>
                                        <td>{{$product->productCategory['name']}}</td>
                                        @if(@empty($product->case_id))
                                        <td>-</td>
                                        @else
                                        <td>{{$product->case['name']}}</td>
                                        @endif
                                        <td>{{$product->weight}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->price}}$</td>
                                        <td>{{$product->type}}</td>
                                        <td>{{$product->color}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
@endsection