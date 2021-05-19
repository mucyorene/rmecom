<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userConstroller extends Controller
{
    public function user(){
    	//$title = 'User Page';
    	//return view('pages.user')->with('title',$title);
    	//return view('pages.user',compact('title'));
    	$services = array(
    		'types' => ['Admin','Teachers','Students','Dean']
    	);
    	return view('pages.user')->with($services);
    }

}