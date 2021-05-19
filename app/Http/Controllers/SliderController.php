<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saveSlide = new Slider();
        $saveSlide->title = $request->input('sliTitle');
        $saveSlide->message = $request->input('sliMessage');
        $saveSlide->image_url = "";

        if ($saveSlide->save()) {
            # code...
            $photo = $request->file('sliPhoto');
            if($photo !=null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000,5000).'.'.$ext;
                if ($ext == 'jpg' || $ext == 'png') {
                    $photo->move(public_path('images'),$fileName);
                    $saveSlide = Slider::find($saveSlide->id);
                    $saveSlide->image_url = url('/').'/images/'.$fileName;
                    $saveSlide->save();
                }
                return redirect()->back()->with('success','Saved successfully');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $saveSlide = Slider::find($id);
        $saveSlide->title = $request->input('sliTitle');
        $saveSlide->message = $request->input('sliMessage');
        $saveSlide->image_url = "";

        if ($saveSlide->save()) {
            # code...
            $photo = $request->file('sliPhoto');
            if($photo !=null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000,5000).'.'.$ext;
                if ($ext == 'jpg' || $ext == 'png') {
                    $photo->move(public_path('images'),$fileName);
                    $saveSlide = Slider::find($saveSlide->id);
                    $saveSlide->image_url = url('/').'/images/'.$fileName;
                    $saveSlide->save();
                }
                return redirect()->back()->with('success','Updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $des = Slider::find($id);
        $des->delete($id);
        return redirect()->back()->with('success','Removed successfully');
    }
}
