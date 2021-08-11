<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $posts = post::paginate(5);
        //$posts = post::all();  
        
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $post = new post();
        $userid = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $post->user_id = $userid;
        $post->title = $request->posttitle;

        $imgdata = $request->file('postimage');
        $imagename = time().'.'.$imgdata->extension();
        $imgdata->move(public_path('images'), $imagename);

        $post->post_image = $imagename;
        $post->body = $request->body;
        $post->save();

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postdisplay = post::findorFail($id);
        return view('posts.show',compact('postdisplay'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $postedit = post::findorFail($id);
        return view('posts.edit',compact('postedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = post::findorFail($id);
        $userid = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $post->user_id = $userid;
        $post->title = $request->posttitle;

        $imgdata = $request->file('postimage');
        $imagename = time().'.'.$imgdata->extension();
        $imgdata->move(public_path('images'), $imagename);

        $post->post_image = $imagename;
        $post->body = $request->body;
        $post->update();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deletepost = post::findorFail($id);
        $deletepost->delete();
        //$postdata = post::paginate(5);
        //return view('posts.index',compact('postdata'));  
        return redirect('posts');
    }
}
