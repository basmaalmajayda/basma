@extends('layouts.main')

@section('content')
 <!-- Sale & Revenue Start -->
 
 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createFoodCategory')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add  Food Category
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All  Food Categories</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Super Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td><img src= "{{ asset($category->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{ $category->name }}</td>
                                        @if(@empty($category->parent))
                                        <td>-</td>
                                        @else
                                        <td>{{ $category->parent['name'] }}</td>
                                        @endif
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/foodCategoryDetails/' . $category->id )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                <a href="{{URL::to('/foody/editFoodCategory/' . $category->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($category->deleted_at))
                                                <a href="{{URL::to('/foody/destroyFoodCategory/' . $category->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreFoodCategory/' . $category->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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