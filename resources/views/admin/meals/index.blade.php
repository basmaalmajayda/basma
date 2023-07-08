@extends('layouts.main')

@section('content')

 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Meals</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($meals as $meal)
                                    <tr>
                                        <td><img src= "{{ asset($meal->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$meal->name}}</td>
                                        <td>{{$meal->price}} ₪</td>
                                        <td>{{$meal->user['name']}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                            <a href="{{URL::to('/foody/mealDetails/' . $meal->id )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                @if(@empty($meal->deleted_at))
                                                <a href="{{URL::to('/foody/destroyMeal/' . $meal->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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