<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Pages;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PagesController extends Controller{
/**
     * Display a listing of the resource.
     *@param string $pages Object
     * @return view 
     */
    public function all(){
        $pages = Pages::all();
        return view('admin.index')->with('pages', $pages);
    }
    
     public function show($slug) {

        //fetch from DB based on slug
        $page = Pages::where('slug', '=', $slug)->first();
        //return he view and pass in the post object
        return view('admin.show')->with('page', $page);
    }
    
    public function getEdit($slug) {
        //find the post in the db and save as a var
        $page = Pages::where('slug', '=', $slug)->first();
        return view('admin.edit')->withPage($page);
    }

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
                'slug' => 'required|alpha_dash|min:3|max:255|unique:posts,slug',
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
    public function destroy($id){
    $page= Pages::FindorFail($id);
    $result=$page->delete();
    if($result){
        return response()->json( );
           

    }
    else {
        return response()->json(['success' => 'false']);
    }
    
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	
			$this->edit = \DataEdit::source(new \App\Category());

			$this->edit->label('Edit Category');

			$this->edit->add('name', 'Name', 'text');
		
			$this->edit->add('code', 'Code', 'text')->rule('required');


        */
       
        return $this->returnEditView();
    }    
}
