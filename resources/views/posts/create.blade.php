@extends('layouts.app')
@section('title','Laravel | Create')
@section('content')<br />
<div class="row">
  <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>CREATE A POST</h1>
  {!! Form::open(['action'=>'PostController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
      {{Form::label('title','Title')}}
      {{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('Body','Body of Blog')}}
      {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter body'])}}
    </div>
    <div class="form-group">
      {{Form::label('cover','Cover Photo')}}
      {{Form::file('coverPhoto')}}
    </div>
    {{Form::submit('Save',['class'=>'btn btn-success'])}}
  {!!Form::close()!!}
    </div>
    <div class="col-md-2"></div>
</div>
@endsection

