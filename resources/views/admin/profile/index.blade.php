@extends('layouts.main')

@section('content')

<body>
	<div class="container-fluid pt-4 px-4">
		<h1>Admin info</h1>
		<img class="rounded-circle me-lg-2" src="{{asset()}}" style="width: 70px; height: 70px;">	
		<div class="admin-data">
			<label>Name : </label>
			<p> Admin Name
				<a href="{{URL::to('/foody/updateName/' . $admin->id )}}" class="btn-primary btn btn-sm me-2"><i class="fas fa-edit"></i></a>
			</p>
			<label>Email :</label>
			<p> Admin Email
				<a href="{{URL::to('/foody/updateEmail/' . $admin->id )}}" class="btn-primary btn btn-sm me-2"><i class="fas fa-edit"></i></a>
			</p>
		</div>
	</div>

@endsection