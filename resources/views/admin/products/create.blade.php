@extends('layouts.main')

@section('content')

@include('layouts.includes.add-status')
@include('layouts.includes.error-messages')

        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/storeProduct') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Add New Product</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Product Create Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Name">
                                <label for="floatingInput">Product Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="description" id="floatingInput" placeholder="Description">
                                <label for="floatingInput">Description</label>
                            </div>
                            <div style="background-color:#000000; padding:10px; border-radius: 5px; margin-bottom:15px;">
                                <label for="case{{$cases[0]->id}}">Medical Case:</label>
                                @foreach($cases as $case)
                                <div class="form-check" id="floatingSelect">
                                    <input type="checkbox" name="case_id[]" id="case{{$case->id}}" value="{{$case->id}}">
                                    <label for="case{{$case->id}}">{{$case->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="cat_id">
                                    <option value="-1" selected></option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Product Category</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="quantity" id="floatingQuantity" placeholder="Quantity">
                                <label for="floatingQuantity">Quantity</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="weight" id="floatingPrice" placeholder="Weight">
                                <label for="floatingWeight">Weight</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="price" id="floatingPrice" placeholder="Price">
                                <label for="floatingPrice">Price</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="color_id">
                                    <option value="-1" selected></option>
                                    @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Color</label>
                            </div>
                            <div>
                                <input class="form-control form-control-lg bg-dark mb-3" name="img" id="formFileLg" type="file">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success m-2">Create</button>
                                <button type="reset" class="btn btn-primary m-2">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection