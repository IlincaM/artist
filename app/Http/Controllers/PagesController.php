<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pages;
use App\TypePage;
use App\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreatePageRequest;
use Intervention\Image\Facades\Image;
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
        $page = Pages::all();
        $categories = Category::with('subcategories')->get();
        return view('admin.create')->withTypes($types)->withPage($page)->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:3|max:255|unique:pages,slug',
            'type_of_the_page' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('admin.create')
                            ->withErrors($validator);
        } else {
            // store
            $page = new Pages;
            $page->title = Input::get('title');
            $page->slug = Input::get('slug');
            $page->type_id = Input::get('type_id');

            if ($page->type_id == 1) {
                $rules = array(
                    'bodyArt' => 'required|max:255',
                    'project' => 'required',
                    'year' => 'required|numeric',
                    'dimension' => 'required',
                );
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return redirect()->route('admin.create')
                                    ->withErrors($validator);
                } else {
                    $page->body = Input::get('bodyArt');
                    $page->category_id = Input::get('category_id');
                    $page->subcategory_id = Input::get('subcategory_id');
                    $page->year = Input::get('year');
                    $page->dimension = Input::get('dimension');
                }
            }
            if ($page->type_id == 2) {
                $rules = array(
                    'body' => 'required|max:255',
                );
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return redirect()->route('admin.create')
                                    ->withErrors($validator);
                } else {
                    $page->body = Input::get('body');
                }
            }


            $page->show_nav = Input::get('show_nav');


            $page->save();


            // redirect
            Session::flash('success', 'Successfully created page!');
            return redirect()->route('admin.show', $page->slug);
        }
    }
    

}
