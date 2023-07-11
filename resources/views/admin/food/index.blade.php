@extends('layouts.main')

@section('content')

 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createFood')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add Food
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Foods</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Arabic Name</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Arabic Category Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($foods as $food)
                                    <tr>
                                        <td><img src= "{{ asset($food->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$food->name}}</td>
                                        <td>{{$food->name_ar}}</td>
                                        <td>{{$food->foodCategory['name']}}</td>
                                        <td>{{$food->foodCategory['name_ar']}}</td>
                                        <td>{{$food->price}} ₪</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editFood/' . $food->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($food->deleted_at))
                                                <a href="{{URL::to('/foody/destroyFood/' . $food->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreFood/' . $food->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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