<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class pagescontroller extends Controller
{
    //
    public function index(){
    	$title = 'Hello Title Test!';
    	//return view('welcome',compact('title'));
    	return view('welcome')->with('title',$title);
    }
    public function first(){
    	return view('pages.firstpage');
        //$r =  DB::table('posts')->where('title','post one')->get();
        //$insert = DB::table('posts')->insertGetId('title'=>'Post three');
        //$update = DB::table('posts')->where('id'->1)->update('column'=>'value');
        //$inc = DB::table('tablename')->increment('columnName');
        //$deleteOnCondition = DB::table('tableName')->where('columnName','operations','value')->delete();
    }

        public function about(){
            $title = "Laravel | About";
        return view('pages.about', compact('title'));
    }


        public function services(){
            $title = 'Laravel | About';

            $data = array(
                'title' => 'Services',
                'services' => ['Health', 'Entertainment', 'Education','Religion']
            );

        return view('pages.servises')->with($data);
       }

}
