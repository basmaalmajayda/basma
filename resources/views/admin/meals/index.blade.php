@extends('layouts.main')

@section('content')

 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createMeal')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add Meals
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Food</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($meals as $meal)
                                    <tr>
                                        <td><img src= "{{ asset($meal->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$meal->name}}</td>
                                        @if(@empty($meal->description))
                                        <td>-</td>
                                        @else
                                        <td>{{$meal->description}}</td>
                                        @endif
                                        <td>{{$meal->price}}$</td>
                                        @if(@empty($meal->rate))
                                        <td>-</td>
                                        @else
                                        <td>{{$meal->rate}}</td>
                                        @endif
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editMeal' . $meal->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($food->deleted_at))
                                                <a href="{{URL::to('/foody/deleteMeal/' . $meal->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreMeal/' . $meal->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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