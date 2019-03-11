<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class PostsController extends Controller
{
    public function index()
    {
        //
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $p = Posts::all();

        return view('show',  compact('p'));
    }

    /**
     * show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=> 'required',
            'author' => 'required'
          ]);
          $posts = new Posts([
            'title' => $request->get('title'),
            'body'=> $request->get('body'),
            'author'=> $request->get('author')
          ]);
          $posts->save();
          return redirect('posts/show')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Posts::find($id);

        return view('edit', compact('p'));
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
        $request->validate([
            'title'=>'required',
            'body'=> 'required',
            'author' => 'required'
          ]);
    
          $p = Posts::find($id);
          $p->title = $request->title;
          $p->body = $request->body;
          $p->author = $request->author;
          $p->save();
    
          return redirect('posts/show')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);
     $posts->delete();

     return redirect('posts/show')->with('success', 'Post has been deleted');
    }
}
