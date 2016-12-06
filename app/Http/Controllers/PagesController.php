<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Pages;
use Illuminate\Http\Request;

class PagesController extends CrudController {

    public function all($entity) {
        parent::all($entity);



        $this->filter = \DataFilter::source(new \App\Pages());
        $this->filter->add('title', 'Title', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
//			$this->grid->add('name', 'Name');
//			$this->grid->add('code', 'Code');
        $this->grid->add('title', 'Title');
        $this->grid->add('body', 'Body');
        $this->addStylesToGrid();
        $pages = Pages::all();
//                echo'<pre>';
//
//        var_dump($posts);
//        die();
//        var_dump( $this->grid->add('title', 'Title'));die();
        return view('index')->with('pages',$pages);
//        return $this->returnView();
//        return view('index');
    }

    public function edit($entity) {

        parent::edit($entity);


        $this->edit = \DataEdit::source(new \App\Pages());

        $this->edit->label('Edit Category');

        $this->edit->add('title', 'Title', 'text');
        $this->edit->add('body', 'Body', 'text');

        $this->edit->add('code', 'Code', 'text')->rule('required');



        return $this->returnEditView();

//        return view('index');
    }

}
