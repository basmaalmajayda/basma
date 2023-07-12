@extends('layouts.main')

@section('content')

<!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">All Messages</h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Messages List</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Sent at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                        <td>{{$message->user['name']}}</td>
                                        <td>{{$message->message}}</td>
                                        @if(@empty($message->phone))
                                        <td>-</td>
                                        @else
                                        <td>{{$message->phone}}</td>
                                        @endif
                                        @if(@empty($message->email))
                                        <td>-</td>
                                        @else
                                        <td>{{$message->email}}</td>
                                        @endif
                                        <td>{{$message->created_at}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/messageDetails/' . $message->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                @if(@empty($message->deleted_at))
                                                <a href="{{URL::to('/foody/destroyMessage/' . $message->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreMessage/' . $message->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
                                                @endif
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