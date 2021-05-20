<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Categories;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId = auth()->user()->id;
        // $user = User::find($userId);
        // return view('Dashboard')->with('posts',$user->posts);
        $cates = Categories::all();
        return view('home',compact('cates'));
    }
}
