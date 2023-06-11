@extends('layouts.main')

@section('content')



         
            
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                <h1 class="h3 mb-2 text-gray-800">Edit Coupons</h1>
            <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Coupons Edit Form</h6>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Falasteen">
                                <label for="floatingInput">Title</label>
                            </div>

                            

                      
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Falasteen">
                                <label for="floatingInput">Coupon Value</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Falasteen">
                                <label for="floatingInput">Coupon Code</label>
                            </div>

                            


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Falasteen">
                                <label for="floatingInput">Duration</label>
                            </div>

                          
                           
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Falasteen">
                                <label for="floatingInput">Start Day</label>
                            </div>
                           

                    
                            <div>
                                
                                <input class="form-control form-control-lg bg-dark mb-3" id="formFileLg" type="file">
                             
                            </div>


                            <div class="form-group">
                            <button type="button" class="btn btn-success m-2">Update</button>
                            <button type="button" class="btn btn-primary m-2">Reset</button>
                </div>

                        </div>
                    </div>
                    </div>
                    </div>




@endsection