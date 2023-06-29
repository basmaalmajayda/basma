@extends('layouts.main')

@section('content')
 
 <!-- Table Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                <div class="col-6">
                    <div>
                        <a href="{{URL::to('/foody/createCoupon')}}"class="btn-primary btn-sm">
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
                                        <th scope="col">Coupon Code</th>
                                        <th scope="col">Coupon Value</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Start Day</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr> 
                                        <td><img src= "{{ asset($coupon->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->value}}</td>
                                        <td>{{$coupon->duration}}</td>
                                        <td>{{$coupon->start_day}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editCoupon/' . $coupon->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($coupon->deleted_at))
                                                <a href="{{URL::to('/foody/deleteCoupon/' . $coupon->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreCoupon/' . $coupon->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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