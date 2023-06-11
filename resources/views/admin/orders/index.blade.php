

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
                                        <th scope="col">Action</th>
                                        
                                        <th scope="col">User Name</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Grder Status</th>
                                        <th scope="col">Details</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                        </td>
                                        <td><a href="{{URL::to('/api/foody/orderDetails')}}">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-success btn-sm">Accepted</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                       
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-success btn-sm">Accepted</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </th>
                                        
                                        <td>Falasteen</td>
                                        <td>cash</td>
                                        <td>150$</td>
                                        <td>
                                          <input type="hidden" name="order_status" value="1">
                                          <button type="submit" class="btn btn-success btn-sm">Accepted</button>
                                        </td>
                                        <td><a href="">Order Details</a></td>
                                    </tr>
                                   
                    

                                   
                                   

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                 
                   
                </div>
            </div>




@endsection