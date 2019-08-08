<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Posts;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::all();
        return view('product/index', compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = new Product();
        $posts = Posts::all();
         return view('product/add_product', compact('pro', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro = new Product();
        $dataup = $request->all();
        if($request->hasFile('image')){
            $file = $request->image;
            $oriName = $file -> getClientOriginalName();
            $filename = str_replace(' ','-',$oriName);
           $filename = uniqid().'-'.$filename;
           $path = $request->file('image')->storeAs('images/Product', $filename);
            $destinationPath = public_path() . '/images/Product';
            $file->move($destinationPath,$filename);
            $dataup['image']= $path;

        }
        $pro->fill($dataup);
        $pro->save();
        return redirect('/pro');
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
        $pro = Product::find($id);
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
        $pro = Product::find($id);
        $pro->delete();
        return redirect('/pro');
    }
    public function details($id){
        $details = Product::find($id);
        // dd($details);
        return view('product/details', compact('details'));
    }
}