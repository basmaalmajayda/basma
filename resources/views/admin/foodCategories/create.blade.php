@extends('layouts.main')

@section('content')

@include('layouts.includes.add-status')
@include('layouts.includes.error-messages')

        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/storeFoodCategory') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Add New Category</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Category Create Form</h6>
                            <div class="form-floating mb-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="parent_id" aria-label="Floating label select example">
                                    <option value="-1"></option>
                                    @foreach($categories as $categoryParent)
                                    @if($categoryParent->children->isEmpty())
                                    <option value="{{$categoryParent->id}}">{{$categoryParent->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Category Parent</label>
                            </div>
                            <div>
                                <input class="form-control form-control-lg bg-dark mb-3" name="img" placeholder="Image" id="formFileLg" type="file">
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