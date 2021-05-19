@extends('layouts.app')
@section('title','Laravel | UserPage')

@section('content')
<br />
<div class="row">
	<div class="col-md-2"></div>
<div class="col-md-8">
	<p align="Center"><h1 class="title m-b-md">Hello User</h1></p><br />
	@if(count($services)>0)
	<ul class="list-group">
		@foreach($services as $service)
		<li class="list-group-item">{{$service}}</li>
		@endforeach
	</ul>
	@endif
</div>
<div class="col-md-2"></div>
</div>
@endsection