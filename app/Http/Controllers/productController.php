<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;


class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Categories::all();
        return view('products.create',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proStore = new Product();

        $proStore->name = $request->input('proName');
        $proStore->price = $request->input('proPrice');
        $proStore->discount = $request->input('proDiscount');
        $proStore->is_hot_product = $request->input('proIsHot')?true:false;
        $proStore->is_new_arrival = $request->input('newArrival')?true:false;
        $proStore->category_id = $request->input('categoryId');
        $proStore->user_id = 0;
        $proStore->photo = "";
        if ($proStore->save()) {

            $photo = $request->file('proPhoto');
            if ($photo !=null) {
                $ext = $photo->getClientOriginalExtension();
                $filename = rand(10000,5000).'.'.$ext;
                if ($ext == 'jpg' || $ext =='png') {
                    $photo->move(public_path('images'),$filename);
                    $proStore = Product::find($proStore->id);
                    $proStore->photo = url('/').'/images/'.$filename;
                    $proStore->save();
                }
            return redirect()->back()->with('success','Saved successfully');
            }
        }
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
        $cate = Categories::all();
        $record = Product::find($id);
        return view('products.edit',compact('cate','record'));
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
        $proStore = Product::find($id);

        $proStore->name = $request->input('proName');
        $proStore->price = $request->input('proPrice');
        $proStore->discount = $request->input('proDiscount');
        $proStore->is_hot_product = $request->input('proIsHot')?true:false;
        $proStore->is_new_arrival = $request->input('newArrival')?true:false;
        $proStore->category_id = $request->input('categoryId');
        $proStore->user_id = 0;
        $proStore->photo = "";

            if ($proStore->save()) {
                $photo = $request->file('proPhoto');
                if ($photo !=null) {
                    $ext = $photo->getClientOriginalExtension();
                    $filename = rand(10000,50000).'.'.$ext;
                    if ($ext == 'jpg' || $ext =='png') {
                        if ($photo->move(public_path('images'),$filename)) {
                            $proStore = Product::find($proStore->id);
                            $proStore->photo = url('/').'/'.$filename;
                            $proStore->save();
                        }
                    }
                   
                }
                return redirect()->back()->with('success','Updated successfully');
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remove = Product::find($id);
        $remove->delete($id);
        return redirect()->back()->with('success','Removed successfully');
    }
}
