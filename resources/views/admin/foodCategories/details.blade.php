
@extends('layouts.main')

@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h1 class="h3 mb-2 text-gray-800">Details Of Category <b>{{$category->name}}</b></h1>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4 ">
                            <h6 class="mb-4">Category information</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Arabic Category Name</th>
                                        <th scope="col">Super Category</th>
                                        <th scope="col">Arabic Super Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><img src= "{{ asset($category->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->name_ar }}</td>
                                        @if(@empty($category->parent))
                                        <td>-</td>
                                        <td>-</td>
                                        @else
                                        <td>{{ $category->parent['name'] }}</td>
                                        <td>{{ $category->parent['name_ar'] }}</td>
                                        @endif
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editFoodCategory/' . $category->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($category->deleted_at))
                                                <a href="{{URL::to('/foody/destroyFoodCategory/' . $category->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreFoodCategory/' . $category->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
                                                @endif
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(!$category->children->isEmpty())
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Sup Categories</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Sup Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->children as $categoryChild)
                                    <tr>
                                        <td><img src= "{{ asset($categoryChild->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$categoryChild->name}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/foodCategoryDetails/' . $categoryChild->id )}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                <a href="{{URL::to('/foody/editFoodCategory/' . $categoryChild->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($categoryChild->deleted_at))
                                                <a href="{{URL::to('/foody/destroyFoodCategory/' . $categoryChild->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreFoodCategory/' . $categoryChild->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
                                                @endif
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                <tbody>  
                            </table>
                        </div>
                    </div>                    
                    @elseif(!$foods->isEmpty())
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Foods</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($foods as $food)
                                    <tr>
                                        <td><img src= "{{ asset($food->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{$food->name}}</td>
                                        <td>{{$food->price}}</td>
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
                                <tbody>  
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
           
@endsection