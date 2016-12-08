<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Posts;
use App\Category;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers;
use  ValidatesRequests;

class PostsController extends Controller {
 
    public function all() {
        

        $posts = Posts::all();

        return view('admin.index')->with('posts', $posts);
    }

    public function show($slug) {

        //fetch from DB based on slug
        $post = Posts::where('slug', '=', $slug)->first();
        //return he view and pass in the post object
        return view('admin.show')->with('post', $post);
    }

    public function edit($slug) {
        //find the post in the db and save as a var
        $post = Posts::where('slug', '=', $slug)->first();
        return view('admin.edit')->withPost($post);
    }

     public function update(Request $request, $id) {
        //Validate the data
        $post = Posts::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:3|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }
        //Save the data to the db
        $post->title = $request->input('title');
        $post->slug = $request->slug;

        $post->body = $request->input('body');
        $post->save();

        //set flash data with success msg
        Session::flash('success', 'This article was succesfully saved.');
        //redirect with flash data to posts.show
        return redirect()->route('admin.show', $post->slug);
    }
    public function delete($id) {
       $page= Posts::find($id);
       return view('admin.delete')->withPage($page);
    }
public function destroy($id){
    $page= Posts::FindorFail($id);
    $result=$page->delete();
    if($result){
        return response()->json( );
           

    }
    else {
        return response()->json(['success' => 'false']);
    }
    
    }
}
