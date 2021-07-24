<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LiProject;
class LiProjects extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LiProject::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client' =>'required',
            'position' =>'required',
            'currentStage' =>'required',
            'location' =>'required',
            'description' =>'required',
            'description' =>'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasfile('images')) {
           foreach ($request->file('images') as $images) {
              $name = time().'.'.$images->extension();
              $images->move(public_path().'/images/', $name);
              $data[]=$name;
           }
        }

        $saving = new LiProject();
        $saving->client = $request->input('client');
        $saving->position = $request->input('position');
        $saving->currentStage = $request->input('currentStage');
        $saving->location = $request->input('location');
        $saving->description = $request->input('description');
        $saving->images = json_encode($data);
        $saving->save();
        return response()->json([
            'message'=>'Successfully saved'
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        request()->validate([
            'client' =>'required';
            'position' =>'required';
            'currentStage' =>'required';
            'location' =>'required';
            'description' =>'required';
            'description' =>'required';
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasfile('images')) {
           foreach ($request->file('images') as $images) {
              $name = time().'.'.$images->extension();
              $images->move(public_path().'/images/', $name);
              $data[]=$name;
           }
        }

        $saving = LiProject::find($id);
        $saving->client = $request->input('client');
        $saving->position = $request->input('position');
        $saving->currentStage = $request->input('currentStage');
        $saving->location = $request->input('location');
        $saving->description = $request->input('description');
        $saving->images = json_encode($data);
        $saving->save();
        return response()->json([
            'message'=>'Successfully updated'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = LiProject::find($id);
        $delete->delete();
        return response()->json([
            'message'=>'Successfully deleted'
        ],201);
    }
}
