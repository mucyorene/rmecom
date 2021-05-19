<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Categories::all();
        return view('categories.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Categories();
        $categories->name = $request->input('catName');
        $categories->icon = "";
        $categories->user_id= 0;
        if ($categories->save()) {
            # code...
            $photo = $request->file('categoryIcon');
            if ($photo != null) {
                # code...
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000,5000).'.'.$ext;
                if ($ext== 'jpg' || $ext=='png') {
                    # code...
                    $photo->move(public_path('images'),$fileName);
                    //$categories->user_id = Categories::find($categories->id);
                    $categories->icon = url('/').'/images/'.$fileName;
                    $categories->save();
                }
            }
            return redirect()->back()->with('success','Saved successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Categories::find($id);
        return view('categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);
        
        $categories->name = $request->input('catName');
        $categories->icon = "";
        $categories->user_id= 0;
        if ($categories->save()) {
            # code...
            $photo = $request->file('categoryIcon');
            if ($photo != null) {
                # code...
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000,5000).'.'.$ext;
                if ($ext== 'jpg' || $ext=='png') {
                    # code...
                    $photo->move(public_path('images'),$fileName);
                    //$categories->user_id = Categories::find($categories->id);
                    $categories->icon = url('/').'/images/'.$fileName;
                    $categories->save();
                }
            }
            return redirect()->back()->with('success','Saved successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Categories::find($id);
        $destroy->delete($id);
        return redirect()->back()->with('success','Successfully removed');
    }
}
