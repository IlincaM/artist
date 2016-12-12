<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pages;
use App\TypePage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreatePageRequest;

class PagesController extends Controller {

    /**
     * Display a listing of the resource.
     * @param string $pages Object
     * @return view 
     */
    public function all() {
        $pages = Pages::all();
        return view('admin.index')->with('pages', $pages);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return view
     */
    public function show($slug) {

        //fetch from DB based on slug
        $page = Pages::where('slug', '=', $slug)->first();
        //return he view and pass in the post object
        return view('admin.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function getEdit($slug) {
        //find the post in the db and save as a var
        $page = Pages::where('slug', '=', $slug)->first();
        return view('admin.edit')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //Validate the data
        $page = Pages::find($id);
        if ($request->input('slug') == $page->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:3|max:255|unique:pages,slug',
                'body' => 'required'
            ));
        }
        //Save the data to the db
        $page->title = $request->input('title');
        $page->slug = $request->slug;

        $page->body = $request->input('body');
        $page->save();

        //set flash data with success msg
        Session::flash('success', 'This article was succesfully saved.');
        //redirect with flash data to posts.show
        return redirect()->route('admin.show', $page->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return ajax call
     */
    public function destroy($id) {
        $page = Pages::FindorFail($id);
        $result = $page->delete();
        if ($result) {
            return response()->json();
        } else {
            return response()->json(['success' => 'false']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        $types = TypePage::all();
        return view('admin.create')->withTypes($types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request, Pages $page) {
        var_dump(CreatePageRequest);die();
        return request()->all();

//store in the database
       
    $page->create($request->all());


//redirect
        return redirect()->route('admin.show', $page->slug);
    }

}
