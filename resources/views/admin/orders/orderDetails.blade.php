
@extends('layouts.main')

@section('content')

  <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

            
                
                <h1 class="h3 mb-2 text-gray-800">Order Details Of Order No <b>1</b></h1>

                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Billing Address</h6>


                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure>
                                <i class="fas fa-user me-2"></i>
                                Falasteen AlAstal 
                                </figure>
                            </div>

                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure>
                                <i class="fas fa-phone me-2"></i>
                                0598765432
                                </figure>
                            </div>

                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure>
                                <i class="fas fa-map-marked me-2"></i>
                                Gaza
                                </figure>
                            </div>
                            

                            </div>
                            </div>



                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4 ">
                            <h6 class="mb-4">Order information</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Meal Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Coupon Value</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">burger</th>
                                        <td>2</td>
                                        <td>25</td>
                                        <td>30%</td>
                                        <td>50</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">burger</th>
                                        <td>2</td>
                                        
                                        <td>25</td>
                                        <td>30%</td>
                                        
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                </div>
           
     


    
   
    @endsection