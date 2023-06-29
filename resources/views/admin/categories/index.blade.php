@extends('layouts.main')

@section('content')
 <!-- Sale & Revenue Start -->
 
 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createCategory')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add  category
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All  Categories</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td><img src= "{{ asset($category->img) }}" width="70" height="70" alt=""></td>
                                        <td>{{ $category->name }}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editCategory' . $category->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($category->deleted_at))
                                                <a href="{{URL::to('/foody/deleteCategory/' . $category->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreCategory/' . $category->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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