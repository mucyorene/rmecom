@extends('layouts.app')
@section('title','Home Page')
@section('content')
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                
                <div class="card">
                <div class="card-close">
                    <div class="dropdown">
                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                    </div>
                </div>
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">All Categories</h3>
                </div>
                <div class="card-body">
                    @include('inc.messages')
                    <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all as $category)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$category->name}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
<section>
@endsection