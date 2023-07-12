@extends('layouts.main')

@section('content')

@include('layouts.includes.add-status')
@include('layouts.includes.error-messages')

        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/register') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Add New Admin</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Admin Create Form</h6>
                            <div class="form-floating mb-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" id="floatingName" name="name" placeholder="Name">
                                <label for="floatingName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingEmail" name="email" placeholder="Email">
                                <label for="floatingEmail">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password_confirmation" placeholder="Password">
                                <label for="floatingPassword">Confirme Password</label>
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