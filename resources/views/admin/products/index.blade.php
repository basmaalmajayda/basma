@extends('layouts.main')

@section('content')

 <!-- Table Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                <div class="col-6">
                    <div>
                        <a href="{{URL::to('/api/foody/addProduct')}}"class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Product
                        </a>
                    </div>
                </div>
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Products</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">weight</th>
                                        <th scope="col">discount value</th>
                                        <th scope="col">Quantity</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">

                                        <div class="action d-flex flex-row">
                                    <a href="{{URL::to('/api/foody/editProduct')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                        </th>
                                        <td><img src="{{asset('/img/cheap-meals.jpeg')}}" width="70" height="70" alt=""></td>
                                        <td>white wheat</td>
                                        <td>20kg</td>
                                        <td>30%</td>
                                        <td>15</td>
                                    </tr>

                                  

                                                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                 
                   
                </div>
            </div>


 

@endsection