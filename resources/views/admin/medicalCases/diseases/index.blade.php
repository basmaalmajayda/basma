@extends('layouts.main')

@section('content')
 <!-- Sale & Revenue Start -->
 
 <!-- Table Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                <div class="col-6">
                    <div>
                        <a href="{{URL::to('/api/foody/addDisease')}}"class="btn-primary btn-sm">
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
                                        <th scope="col">Action</th>
                                        <th scope="col">Name</th>
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editDisease')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>Vegetarian</td>
                                       
                                        
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editDisease')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>Wheat Allergy</td>
                                       
                                        
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editDisease')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>Vegan</td>
                                       
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editDisease')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>Milk Allergy</td>
                                       
                                     
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editDisease')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>Lipodystrophy</td>
                                      
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editDisease')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>Healthy Diet</td>
                                      
                                        
                                    </tr>

                    

                                   
                                   

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                 
                   
                </div>
            </div>



@endsection