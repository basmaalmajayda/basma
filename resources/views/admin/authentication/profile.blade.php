@extends('layouts.main')

@section('content')

<body>
	<div class="container-fluid pt-4 px-4">
		<h1>Admin info</h1>
		<div class="admin-data">
		<br>
			<h6><label>Name : {{Auth::guard('admin')->user()->name}}</label></h6>
			<h6><label>Email : {{Auth::guard('admin')->user()->email}}</label></h6>
		</div>
	</div>

@endsection