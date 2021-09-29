<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Monetization;
use Session;
use Exception;
class MonetizationController extends Controller
{
    private $url='monetization';
    private $redirect_url='admin/monetization';
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Monetization';
        $headings= ["id"=>"Id","name"=>"Name","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Monetization::all();
        $url=$this->url;
        $form_data = [['name'=>'Monetization Name', "type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Make Monetization Featured', "type"=>"select", "data"=>[''=>'--select status','1'=>"Yes",'0'=>"No"], "attrib"=>'required="required" name="is_featured" '],
        ['name'=>'Featured Image', "type"=>"file", "attrib"=>'required="required" name="img"   accept="image/png, image/jpeg" ']];
       
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
            
            if($request->hasFile('img')){
            $filenameWithExt=$request->file('img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('img')->storeAs('public/monetization_images',$fileNameToStore);
            }
            else{$fileNameToStore='noimg.jpg';}
            //
            $var = new Monetization;
            $var->name = $request->name;
            $var->is_featured = $request->is_featured;
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
        $orient=Monetization::whereId($id)->first();
        $url=$this->redirect_url;
        $title="Monetization";
        $data = [['name'=>'Monetization Name',"naming"=>"name", "type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Make Monetization Featured',"naming"=>"is_featured" ,"type"=>"select", "data"=>[''=>'--select status','1'=>"Yes",'0'=>"No"], "attrib"=>'required="required" name="is_featured" ']
        ,['name'=>'New Featured Image',"naming"=>"", "type"=>"file", "attrib"=>'name="img"   accept="image/png, image/jpeg" '],
        ['name'=>'',"naming"=>"image", "type"=>"hidden", "attrib"=>'name="old_img"']
    ];
        $path="monetization_images";
        return view('admin-panel.pages.edit',compact('title','data','url','orient','path'));
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
                $path=$request->file('img')->storeAs('public/monetization_images',$fileNameToStore);
                }
            $var = Monetization::findOrFail($id);
            $var->name = $request->name;
            $var->is_featured = $request->is_featured;
            if(isset($fileNameToStore)){
                $var->image=$fileNameToStore;
            }else{
                $var->image=$request->old_img;
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
            Monetization::findOrFail($id)->delete();
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
