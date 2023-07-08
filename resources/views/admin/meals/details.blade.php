
@extends('layouts.main')

@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Details Of <b>{{$meal->name}}</b></h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4 ">
                            <h6 class="mb-4">Meal information</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Medical Case</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><img src= "{{ asset($meal->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$meal->name}}</td>
                                        <td>{{$meal->price}} ₪</td>
                                        <td>{{$meal->user['name']}}</td>
                                        <td>{{$meal->user->case['name']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Meal Ingredients</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Food</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($meal->ingredients as $ingredient)
                                    <tr>
                                        <td>{{$ingredient->order_no}}</td>
                                        <td><img src= "{{ asset($ingredient->food['img']) }}" width="70" height="70" alt=""></td>
                                        <td>{{$ingredient->food['name']}}</td>
                                        <td>{{$ingredient->food->foodCategory['name']}}</td>
                                        <td>{{$ingredient->food['price']}}$</td>
                                    </tr>
                                    @endforeach
                                <tbody>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
@endsection