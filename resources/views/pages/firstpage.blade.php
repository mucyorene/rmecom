	@extends('layouts.app')
	@section('title','Laravel | Login')
	@section('content')
	<form class="form">
	   <table class="table">
	   			<th>
	   				<td colspan="2">Login Form</td>
	   			</th>
	   			<tr><td>UserName</td><td><input type="text" name="username" class="form-control"></td></tr>
	   			<tr><td>Password</td><td><input type="password" name="" class="form-control"></td></tr>
	   			<tr><td colspan="2" align="right"><input type="submit" class="btn btn-outline-info" name=""></td></tr>
	   		
	   </table></form>
	@endsection