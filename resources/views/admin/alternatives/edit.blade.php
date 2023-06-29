@extends('layouts.main')

@section('content')
        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/updateAlternative') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Edit Alternative Food</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Alternative Food Edit Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $alternative->id }}">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="case_id">
                                    <option value="-1" selected></option>
                                        @foreach($cases as $case)
                                        @if($case->id == $alternative->forbidden->medicalCase['id'])
                                        <option value="{{$case->id}}" selected>{{$case->name}}</option>
                                        @else
                                        <option value="{{$case->id}}">{{$case->name}}</option>
                                        @endif
                                        @endforeach
                                </select>
                                <label for="floatingSelect">Medical Case</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="forbidden_id">
                                    @foreach($foods as $food)
                                    @if($food->id == $alternative->forbidden->food['id'])
                                    <option value="{{$food->id}}" selected>{{$food->name}}</option>
                                    @else
                                    <option value="{{$food->id}}">{{$food->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Forbidden Food</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="alternative_id">
                                    @foreach($foods as $food)
                                    @if($food->id == $alternative->alternativeFood['id'])
                                    <option value="{{$food->id}}" selected>{{$food->name}}</option>
                                    @else
                                    <option value="{{$food->id}}">{{$food->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Alternative Food</label>
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