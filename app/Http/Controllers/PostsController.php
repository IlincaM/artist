<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Posts;
use App\Category;
use Illuminate\Http\Request;
use Session;
class PostsController extends CrudController {

    public function all($entity) {
        parent::all($entity);



        $this->filter = \DataFilter::source(new \App\Posts());
        $this->filter->add('title', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source(Posts::with('category', 'subcategory'));

        $this->grid->add('title', 'Name');
        $this->grid->add('body', 'Subtitlu');
        $this->grid->add("category.title", 'Categorie');
        $this->grid->add('subcategory.title', 'Subcategory');

        $this->grid->add('code', 'Code');
        $this->addStylesToGrid();
        $posts = Posts::all();

//        return $this->returnView();
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
        return redirect()->route('admin.show', $post->id);
    }


}
