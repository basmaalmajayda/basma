@extends('layouts.main')

@section('content') 

@include('layouts.includes.error-messages')
@include('layouts.includes.update-status')


        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/updateDisease') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Edit Medical Case</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Medical Case Edit Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $disease->id }}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingInput" value="{{ $disease->name }}">
                                <label for="floatingInput">Case Name</label>
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