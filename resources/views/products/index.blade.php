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
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th>Discount</th>
                        <th>Hot Product</th>
                        <th>New Arrival</th>
                        <th>Category</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td><img src="{{$product->photo}}" height="100" width="100" alt=""></td>
                                <td>{{$product->discount}}</td>
                                <td>{{$product->is_hot_product}}</td>
                                <td>{{$product->is_new_arrival}}</td>
                                <td>{{$product->category->name}}</td>
                                <td><a href="/editProduct.{{$product->id}}" class="btn btn-outline-info btn-sm">Edit</a> | <a href="/destroyProduct/{{$product->id}}" class="btn btn-outline-danger btn-sm">Delete</a></td>
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