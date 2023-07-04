@extends('layouts.main')

@section('content')
 
 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createDisease')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add Disease
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Diseases</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Case Name</th>
                                        <th scope="col">Arabic Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($diseases as $disease)
                                    <tr>
                                        <td>{{$disease->name}}</td>
                                        <td>{{$disease->name_ar}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editDisease/' . $disease->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($disease->deleted_at))
                                                <a href="{{URL::to('/foody/destroyDisease/' . $disease->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreDisease/' . $disease->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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