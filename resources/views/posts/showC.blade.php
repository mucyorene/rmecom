 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/modern-business.css" rel="stylesheet">
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <title>Laravel | Read</title>
    </head>
@include('layouts.app')
<div class="container">
	<br />
@if(count($p)>0)
	<div class="row" style="background-color: #cccfff;">
		<div class="col-md-2 text-center"><img src="/storage/images/cover/{{$p->coverPic}}"></div>
		<div class="col-md-8 text-center">
				<h1>{{$p->title}}</h1>
	<br>
	<small>Written on: {{$p->created_at}}</small>
	<p>{!!$p->body!!}</p>
	<div class="col-md-12">
		{!!Form::open(['action'=>['PostController@destroy',$p->id],'method'=>'POST','class'=>'form'])!!}
			{{Form::hidden('_method','Delete')}}
			{{Form::submit('Remove',['class'=>'btn btn-info btn-sm btn-danger'])}}
		{!!Form::close()!!}

	</div>
		</div>
		<div class="col-md-2"></div>
	</div>
@else
<h1>Not enough posts</h1>
@endif
</div>