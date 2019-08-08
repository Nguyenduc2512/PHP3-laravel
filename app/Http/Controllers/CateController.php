<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Category;
use DB;
use App\Http\Requests\AddFormRequest;



class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::all();
        $posts = Posts::all();
        return view('category.index_cate', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = new Category();
        return view('category.add_cate', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cates = new Category();
        $cate = $request ->all();
       if($request->hasFile('image')){
           $file = $request->image;
           $oriName = $request->image-> getClientOriginalName();
           $filename = str_replace(' ','-',$oriName);
           $filename = uniqid().'-'.$filename;
           $path = $request->file('image')->storeAs('images/category', $filename);
            $destinationPath = public_path() . '/images/category/';
            $file->move($destinationPath,$filename);
            $cate['image'] = $path;
        }
            
            // dd($cate);

            $cates -> fill($cate);
            $cates->save();
            return redirect('/cate');
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
        $cates = Category::find($id);
        return view('category/edit_cate', compact('cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddFormRequest $request)
    {
        $cates = Category::find($request->id);
             $cate = $request ->all();
       if($request->hasFile('image')){
           $file = $request->image;
           $oriName = $request->image-> getClientOriginalName();
           $filename = str_replace(' ','-',$oriName);
           $filename = uniqid().'-'.$filename;
           $path = $request->file('image')->storeAs('images/category', $filename);
            $destinationPath = public_path() . '/images/category/';
            $file->move($destinationPath,$filename);
            $cate['image'] = $path;
        }
            
            // dd($cate);

            $cates -> fill($cate);
            $cates->save();
            return redirect('/cate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cates = Category::find($id);
        $cates = Category::destroy($id);
return $this->postRemove($id);
    }
    public function postRemove($id){
    $posts = Posts::where('category_id',$id);
    // $posts -> belongsto('Posts', 'id','category_id');
    // dd($posts);
    $posts->delete();
return redirect('/cate');
    }
}