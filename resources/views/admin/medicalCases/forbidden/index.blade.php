@extends('layouts.main')

@section('content')
 <!-- Sale & Revenue Start -->
 
 <!-- Table Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                <div class="col-6">
                    <div>
                        <a href="{{URL::to('/api/foody/addForbidden')}}"class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Forbidden Food
                        </a>
                    </div>
                </div>
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Forbidden Foods</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Forbidden Food</th>

                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editForbidden')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>1</td>
                                        <td>Vegetarian</td>
                                        <td>Processed meat</td>
                                       
                                        
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editForbidden')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>2</td>
                                        <td>Vegetarian</td>
                                        <td>Processed meat</td>
                                       
                                        
                                    </tr>


                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editForbidden')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>3</td>
                                        <td>Vegetarian</td>
                                        <td>Processed meat</td>
                                       
                                        
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editForbidden')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>4</td>
                                        <td>Vegetarian</td>
                                        <td>Processed meat</td>
                                       
                                        
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editForbidden')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td>5</td>
                                        <td>Vegetarian</td>
                                        <td>Processed meat</td>
                                       
                                        
                                    </tr>

                                    

                    

                                   
                                   

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                 
                   
                </div>
            </div>



@endsection