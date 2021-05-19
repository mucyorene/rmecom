@extends('layouts.app')
@section('title','Laravel | UserPage')
@section('sidebar')
	@parent
@section('content')
<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<p align="Center"><h1 class="title m-b-md">Hello User</h1></p><br />
			@if(count($types)>0)
			<ul class="list-group">
				@foreach($types as $service)
				<li class="list-group-item">{{$service}}</li>
				@endforeach
			</ul>
			@endif
		</div>
<div class="col-md-3"></div>
</div>
@endsection