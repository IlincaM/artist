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

        return $this->returnView();
//        return view('index')->with('posts', $posts);
    }

    public function edit($entity) {

        parent::edit($entity);


        $this->edit = \DataEdit::source(new \App\Posts());

        $this->edit->label('Edit Category');

        $this->edit->add('title', 'Name', 'text');

        $this->edit->add('code', 'Code', 'text')->rule('required');



        return $this->returnEditView();
    }

}
