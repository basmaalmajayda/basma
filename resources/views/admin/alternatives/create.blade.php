@extends('layouts.main')

@section('content')
        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/storeForbidden') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Add New Alternative Food</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Alternative Food Create Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="case_id">
                                    <option value="-1" selected></option>
                                    @foreach($cases as $case)
                                    <option value="{{$case->id}}">{{$case->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Medical Case</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="food_id">
                                    <option value="-1" selected></option>
                                    @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{$food->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Forbidden Food</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="alternative_id">
                                    <option value="-1" selected></option>
                                    @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{$food->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Alternative Food</label>
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