<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::orderBy('title','asc')->paginate(1);
        return view('posts.index')->with('posts',$posts);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'coverPhoto' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('coverPhoto')) {
            //getting all file name with extensions
            $filewithex = $request->file('coverPhoto')->getClientOriginalName();
            //Finding only File name
            $filename = pathinfo($filewithex,PATHINFO_FILENAME);
            //Finding only extention
            $exte = $request->file('coverPhoto')->getClientOriginalExtension();
            //Which to store
            $fileToStore = ($filename.'_'.time().'.'.$exte);
            $path = $request->file('coverPhoto')->storeAs('/public/images/cover',$fileToStore);
        }else{
            $fileToStore = 'noimage.jpg';
        }
        $post = new Posts;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->userId = auth()->user()->id;
        $post->user_Id = auth()->user()->id;
        $post->coverPic = $fileToStore;
        $post->save();
        return redirect('/posts')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postshow = Posts::find($id);
        return view('posts.showC')->with('p',$postshow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = Posts::find($id);
        if (auth()->user()->id !== $user->user_Id) {
            return redirect('/posts')->with('error','You are unautorized user');
        }else{
            $user->delete();
            return redirect('/posts')->with('success','Post Removed successfully');
        }
    }
}