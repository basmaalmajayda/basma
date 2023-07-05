@extends('layouts.main')

@section('content')

@include('layouts.includes.update-status')
@include('layouts.includes.error-messages')

        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/foody/updateNotification') }}">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Edit Notification</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Notification Edit Form</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $notification->id }}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="floatingInput" value="{{$notification->title}}">
                                <label for="floatingInput">Notification Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_ar" id="floatingInput" value="{{$notification->title_ar}}">
                                <label for="floatingInput">Arabic Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="body" id="floatingInput" value="{{$notification->body}}">
                                <label for="floatingInput">Body</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="body_ar" id="floatingInput" value="{{$notification->body_ar}}">
                                <label for="floatingInput">Arabic Body</label>
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