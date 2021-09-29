<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Socialplatform;
use Session;
use Exception;
class SocialPlatformController extends Controller
{
    private $url='social-platforms';
    private $redirect_url='admin/social-platforms';
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Social Platforms';
        $headings= ["id"=>"Id","name"=>"Name","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Socialplatform::all();
        $url=$this->url;
        $form_data = [['name'=>'Social Platform', "type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"']];
       
        
        return view('admin-panel.pages.index',compact('title','headings','values','url','form_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $var = new Socialplatform;
            $var->name = $request->name;
            $var->status_id =get_status_id('active');
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
        $orient=Socialplatform::whereId($id)->first();
        $url=$this->redirect_url;
        $title="Socialplatform";
        $data = [['name'=>'Social Platform',"naming"=>"name", "type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"']];
        return view('admin-panel.pages.edit',compact('title','data','url','orient'));
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
            $var =Socialplatform::findOrFail($id);
            $var->name = $request->name;
            $var->status_id =get_status_id('active');
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
            Socialplatform::findOrFail($id)->delete();
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
