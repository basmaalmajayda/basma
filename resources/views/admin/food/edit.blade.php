@extends('layouts.main')

@section('content')

@include('layouts.includes.update-status')
@include('layouts.includes.error-messages')

        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/updateFood') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Edit Food</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Food Edit Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $food->id }}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" name="name" value="{{ $food->name }}">
                                <label for="floatingTextarea">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="cat_id" aria-label="Floating label select example">
                                    @foreach($categories as $category)
                                    @if($category->id == $food->foodCategory['id'])
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Category Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" name="price" value="{{ $food->price }}">
                                <label for="floatingTextarea">Price</label>
                            </div>
                            <div>
                                <input class="form-control form-control-lg bg-dark mb-3" name="img" placeholder="Photo" id="formFileLg" type="file">
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