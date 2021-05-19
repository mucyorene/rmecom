@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-info">Create Post</a>
                    <br /><br /><h5>Your Posts</h5><br />
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <td>Title</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($posts as $postss)
                            <tr>
                                <td>{{$postss->title}}</td>
                                <td>
                                    {!!Form::open(['action'=>['PostController@edit',$postss->id],'method'=>'POST','class'=>'form'])!!}
                                        {{Form::hidden('hiddenId')}}
                                    {!!Form::close()!!}
                                </td>
                                <td>
                                    {!!Form::open(['action'=>['PostController@destroy',$postss->id],'method'=>'POST','class'=>'form'])!!}
                                        {{Form::hidden('_method','Delete')}}
                                        {{Form::submit('Remove',['class'=>'btn btn-info btn-sm btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <h5>No Post</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
