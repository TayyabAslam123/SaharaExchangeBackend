<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sociallink;

use Session;
use Exception;

class SocialLinkController extends Controller
{
    private $url='social-links';
    private $redirect_url='admin/social-links';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Social Links';
        $headings= ["id"=>"Id","name"=>"Name","url"=>"Url","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Sociallink::all();
        $url=$this->url;
        $form_data = [
            ['name'=>'Social Platform', "type"=>"select", "data"=>[''=>'--select a social platform','facebook'=>"facebook",'twitter'=>"twitter",'instagram'=>"instagram",'linkedin'=>"linkedin"], "attrib"=>'required="required" name="name" '],
        ['name'=>'Url', "type"=>"url", "attrib"=>'required="required" name="url" maxlength="200"']];
       
        
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
            $var = new Sociallink;
            $var->name = $request->name;
            $var->url = $request->url;
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
        $orient=Sociallink::whereId($id)->first();
        $url=$this->redirect_url;
        $title="Social Link";
        $data = [
        ['name'=>'Social Platform',"naming"=>"name" ,"type"=>"select", "data"=>[''=>'--select a social platform','facebook'=>"facebook",'twitter'=>"twitter",'instagram'=>"instagram",'linkedin'=>"linkedin"], "attrib"=>'required="required" name="name" '],
        ['name'=>'Url', "type"=>"url","naming"=>"url" ,"attrib"=>'required="required" name="url" maxlength="200"']];
       
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
            $var = Sociallink::findOrFail($id);
            $var->name = $request->name;
            $var->url = $request->url;
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
            Sociallink::findOrFail($id)->delete();
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
