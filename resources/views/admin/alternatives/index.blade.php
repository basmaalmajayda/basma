@extends('layouts.main')

@section('content')
 
 <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">  
                    <div class="col-6">
                        <div>
                            <a href="{{URL::to('/foody/createAlternative')}}"class="btn-primary btn-sm">
                                <i class="fas fa-plus-circle mr-1"></i>
                                Add Alternative Food
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Alternative Foods</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Medical Case</th>
                                        <th scope="col">Forbidden Food</th>
                                        <th scope="col">Alternative Food</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatives as $alternative)
                                    <tr>
                                        <td>{{$alternative->forbidden->medicalCase['name']}}</td>
                                        <td>{{$alternative->forbidden->food['name']}}</td>
                                        <td>{{$alternative->alternativeFood['name']}}</td>
                                        <th scope="row">
                                            <div class="action d-flex flex-row">
                                                <a href="{{URL::to('/foody/editAlternative/' . $alternative->id )}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                @if(@empty($alternative->deleted_at))
                                                <a href="{{URL::to('/foody/destroyAlternative/' . $alternative->id )}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @else
                                                <a href="{{URL::to('/foody/restoreAlternative/' . $alternative->id )}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
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