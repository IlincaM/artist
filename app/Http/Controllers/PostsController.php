<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Posts;
use App\Category;
use Illuminate\Http\Request;

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

    public function show($id) {

        //fetch from DB based on slug
        $posts = Posts::find($id);
        //return he view and pass in the post object
        return view('admin.show')->with('posts', $posts);
    }

    public function edit($id) {
        //find the post in the db and save as a var
        $posts = Posts::find($id);        //return the view
        
        return view('admin.edit')->withPosts($posts);
    }

    public function update() {
        
    }

}
