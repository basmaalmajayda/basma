@extends('layouts.main')

@section('content')
        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/storeFood') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Add New Food</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Food Create Form</h6>
                            <div class="form-floating mb-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingTextarea" name="description" placeholder="Description"></input>
                                <label for="floatingTextarea">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="cat_id" aria-label="Floating label select example">
                                    <option value="1">cat1</option>
                                    <option value="2">cat2</option>
                                    <option value="3">cat3</option>
                                    <option value="4">cat4</option>
                                    <option value="5">cat5</option>
                                    <option value="6">cat6</option>
                                    <option value="7">cat7</option>
                                </select>
                                <label for="floatingSelect">Category name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPrice" name="price" placeholder="Price">
                                <label for="floatingPrice">Price</label>
                            </div>
                            <div>
                                <input class="form-control form-control-lg bg-dark mb-3" name="img" placeholder="Photo" id="formFileLg" type="file">
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