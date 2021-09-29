<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Session;
use Exception;

class BlogController extends Controller
{
    private $url='blog';
    private $redirect_url='admin/blog';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Blog Posts';
        $headings= ["id"=>"Id","title"=>"Title","description"=>"Description","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Blog::all();
        $url=$this->url;
        $custom_btn=$this->url.'/create';
        $public_url="/blog-post";
        $show_btn=true;

        return view('admin-panel.pages.index',compact('title','headings','values','url','custom_btn','public_url','show_btn'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.add-blog-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if($request->hasFile('img')){
                $filenameWithExt=$request->file('img')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('img')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('img')->storeAs('public/blog_images',$fileNameToStore);
                
            }
                
                else{$fileNameToStore='noimg.jpg';}


            $var = new Blog;
            $var->user_id=auth()->user()->id;
            $var->title = $request->title;
            $var->description = $request->description;
            $var->tag =$request->tagline;
            $var->image=$fileNameToStore;
     

            $var->save();
            Session::flash('message', 'ADDED SUCCESSFULLY');
            Session::flash('alert-class', 'alert-success'); 
            return redirect($this->redirect_url);
       }
       catch(Exception $e){
                Session::flash('message', $e->getMessage());
                Session::flash('alert-class', 'alert-danger'); 
                return redirect($this->redirect_url);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orient=Blog::whereId($id)->first();
        $title="Edit Blog Post";
        return view('admin-panel.pages.edit-blog-post',compact('title','orient'));
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
         
        try{
            if($request->hasFile('img')){
                $filenameWithExt=$request->file('img')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('img')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('img')->storeAs('public/blog_images',$fileNameToStore);
                @unlink("storage/blog_images/".$request->old_image);
            }

            $var = Blog::findOrFail($id);
            $var->user_id=auth()->user()->id;
            $var->title = $request->title;
            $var->description = $request->description;
            $var->tag ="business";
            if(isset($fileNameToStore)){
                $var->image=$fileNameToStore;
            }
            else{
                $var->image=$request->old_image;
            }
         
            $var->save();

            Session::flash('message', 'UPDATED SUCCESSFULLY');
            Session::flash('alert-class', 'alert-success'); 
            return redirect($this->redirect_url);
        }
            catch(Exception $e)
              {
                Session::flash('message', $e->getMessage());
                Session::flash('alert-class', 'alert-danger'); 
                return redirect($this->redirect_url);
              }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Blog::findOrFail($id)->delete();
            Session::flash('message', 'DELETED SUCCESSFULLY');
            Session::flash('alert-class', 'alert-success'); 
            return redirect($this->redirect_url);
        }
            catch(Exception $e)
              {
                
                Session::flash('message', $e->getMessage());
                Session::flash('alert-class', 'alert-danger'); 
                return redirect($this->redirect_url);
              }
    }
}
