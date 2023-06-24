@extends('layouts.main')

@section('content')
 
 <!-- Table Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                <div class="col-6">
                    <div>
                        <a href="{{URL::to('/foody/addCoupon')}}"class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Coupon
                        </a>
                    </div>
                </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Coupons</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr> 
                                        <td><img src="{{asset('/img/challenges.jpg')}}" width="70" height="70" alt=""></td>
                                        <td>Doe</td>
                                        <td>HiiiiiiiiiiiiiiiiiiiHIIII</td>
                                        <td>30 day</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editCoupon')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                                <a href="{{URL::to('/foody/deleteCoupon')}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection