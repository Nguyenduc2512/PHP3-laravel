<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddFormRequest;

use Carbon\Carbon;
use App\Category;
use App\Posts;
use App\User;
use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        // dd($posts);
        
        $cates = Category::all();
        $posts = Posts::paginate(5);
        
        return view('index', compact('posts',));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Posts();
        $author = User::all();
        $cates = Category::all();

        return view('Create', compact('model', 'author', 'cates'));
    }

    public function store(Request $request)
    {
        $model = new Posts();
        $data = $request->all();
        
        $data['image'] = $this->showUploadFile($request);
        $model->fill($data);
        $model->save();
        return redirect("/");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::find($id);
        if(!$posts){
            return view('homepage');
        }
        $author = User::all();
        $cates = Category::all();

        return view('EditPost', compact('posts', 'cates', 'author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddFormRequest $request)
    {
        $posts = Posts::find($request->id);
        $post = $request->all();
       if($request->hasFile('image')){
           $file = $request->image;
           $oriName = $request->image-> getClientOriginalName();
           $filename = str_replace(' ','-',$oriName);
           $filename = uniqid().'-'.$filename;
           $path = $request->file('image')->storeAs('images', $filename);
            $destinationPath = public_path() . '/images/';
            $file->move($destinationPath,$filename);
            $post['image']= $path;
        }
        $posts->fill($post);
        $posts ->save();
        return redirect(route('homepage'));
    }
    public function showUploadFile( Request $request) //
    {
        $file = $request->file('image');
        // dd($file);
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();
        $destinationPath = public_path() . '/images/';
        $file->move($destinationPath,$file->getClientOriginalName());
        $name = '/images/'.$file->getClientOriginalName();
        // dd($destinationPath.$file->getClientOriginalName());
        return $name; 
        // dd($destinationPath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
        $posts = Posts::find($id);
        // dd($posts)
        // DB::table('posts')->where('id',$posts->id)->delete();
        // $posts->delele();
        $posts = Posts::destroy($id);
        return redirect('/');
    }
}