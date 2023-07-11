
@extends('layouts.main')

@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Details Of Message</h1>
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Information</h6>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fas fa-user me-2"></i>{{$message->user['name']}}</figure>
                            </div>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fas fa-phone me-2"></i>{{$message->phone}}</figure>
                            </div>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fas fa-map-marked me-2"></i>{{$message->email}}</figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Message</h6>
                            <div style="height: 170px;" class="border rounded p-4 pb-0 mb-4">
                                <figure><i class="fa fa-envelope me-2"></i></i>{{$message->message}}</figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
@endsection