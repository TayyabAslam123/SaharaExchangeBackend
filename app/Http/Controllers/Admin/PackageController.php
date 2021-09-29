<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use Session;
use Exception;
class PackageController extends Controller
{
    private $url='package';
    private $redirect_url='admin/package';
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Package';
        $headings= ["id"=>"Id","name"=>"Name","price"=>"Price","description"=>"Description","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Package::all();
        $url=$this->url;
        $form_data = [['name'=>'Package Name', "type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Description', "type"=>"text", "attrib"=>'required="required" name="description" maxlength="200"'],
        ['name'=>'Price ( $ )', "type"=>"number", "attrib"=>'required="required" name="price" maxlength="200"']];
       
      
        
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
            $var = new Package;
            $var->name = $request->name;
            $var->description = $request->description;
            $var->price = $request->price;
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
        $orient=Package::whereId($id)->first();
        $url=$this->redirect_url;
        $title="Package";
        $data = [['name'=>'Package Name',"naming"=>"name","type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Description', "naming"=>"description","type"=>"text", "attrib"=>'required="required" name="description" maxlength="200"'],
        ['name'=>'Price ( $ )', "naming"=>"price","type"=>"number", "attrib"=>'required="required" name="price" maxlength="200"']];
       
      
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
            $var = Package::findOrFail($id);
            $var->name = $request->name;
            $var->description = $request->description;
            $var->price = $request->price;
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
            Package::findOrFail($id)->delete();
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
