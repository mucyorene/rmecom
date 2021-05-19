@extends('layouts.app')
@section('title','Edit | Categories')
@section('content')
     <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ul>
    </div>

    <section class="forms"> 
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-3"></div>
            <!-- Horizontal Form-->
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Horizontal Form</h3>
                    </div>
                    <div class="card-body">
                        @include('inc.messages')
                        <form class="form-horizontal" action="/catUpdate.{{$data->id}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Category Name</label>
                            <div class="col-sm-9">
                            <input id="inputHorizontalSuccess" type="text" name="catName" value="{{$data->name}}" class="form-control form-control-success"><small class="form-text">Example help text that remains unchanged.</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Category Icon</label>
                            <div class="col-sm-9">
                                <input id="inputHorizontalSuccess" type="file" name="categoryIcon" class="form-control form-control-success" onchange="loadPhoto"><small class="form-text">Example help text that remains unchanged.</small>
                            </div>
                        </div>
                        <div>
                            <img src="photo" height="100" width="100" alt="">
                        </div>
                        <div class="form-group row">       
                            <div class="col-sm-9 offset-sm-3">
                            <input type="submit" value="Signin" class="btn btn-primary">
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            <div class="col-lg-3"></div>
            </div>
        </div>
    </section>
@endsection