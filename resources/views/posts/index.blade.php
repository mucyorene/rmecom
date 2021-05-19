@extends('layouts.app')
@section('title','Laravel | Posts')
@section('content')
<br /><br />
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-6 text-left">
		<div class="well">
			<h2>Posts</h2><br />
			@if(count($posts)>0)
			@foreach($posts as $post)
			<a href="/posts/{{$post->id}}">{{$post->title}}</a> <br />
			<small><label>Written:</label>{{$post->created_at}}</small><br />
			@endforeach
			{{$posts->links()}}
			@else
			<h3>No Post found</h3>
			@endif
		</div>
	</div>
	<div class="col-md-3"></div> 
</div>
@endsection