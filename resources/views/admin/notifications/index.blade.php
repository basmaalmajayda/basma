@extends('layouts.main')

@section('content')

<!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">   
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createNotification')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add Notification
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Notifications</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notifications as $notification)
                                    <tr>
                                        <td><img src="{{ asset($notification->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$notification->title}}</td>
                                        <td>{{$notification->body}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editNotification/' . $notification->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($notification->deleted_at))
                                                <a href="{{URL::to('/foody/destroyNotification/' . $notification->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreNotification/' . $notification->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
                                                @endif
                                                <a href="{{URL::to('/foody/sendNotification/' . $notification->id )}}" class="btn btn-info"><i class="fa fa-paper-plane" style="color: #ffffff;"></i></a>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection