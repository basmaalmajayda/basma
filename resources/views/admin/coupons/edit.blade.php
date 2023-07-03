@extends('layouts.main')

@section('content')

        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/updateCoupon') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Edit Coupon</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Coupon Edit Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $coupon->id }}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="code" id="floatingInput" value="{{$coupon->code}}">
                                <label for="floatingInput">Coupon Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="value" id="floatingInput" value="{{$coupon->value}}">
                                <label for="floatingInput">Coupon Value</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="start_day" id="floatingInput" value="{{$coupon->start_day}}">
                                <label for="floatingInput">Start Day</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="duration" id="floatingInput" value="{{$coupon->duration}}">
                                <label for="floatingInput">Duration in Days</label>
                            </div>
                            <div>
                                <input class="form-control form-control-lg bg-dark mb-3" name="img" id="formFileLg" type="file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success m-2">Update</button>
                                <button type="reset" class="btn btn-primary m-2">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection