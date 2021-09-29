<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use Session;
use Exception;


class FaqController extends Controller
{
    private $url='faqs';
    private $redirect_url='admin/faqs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $title='Frequently Ask Questions';
        $headings= ["id"=>"Id","question"=>"Question","answer"=>"Answer","user_type"=>"User Type","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Faq::all();
        $url=$this->url;

        $form_data = [
            ['name'=>'Question', "type"=>"text", "attrib"=>'required="required" name="question" maxlength="200"'],
            ['name'=>'Answer', "type"=>"text", "attrib"=>'required="required" name="answer" maxlength="200"'],
            ['name'=>'For Which User Type You Want To Add This Faq ?', "type"=>"select", "data"=>['seller'=>"Seller",'buyer'=>"Buyer"], "attrib"=>'name="user_type" ']
        ];
    
        
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
            $var = new Faq;
            $var->question = $request->question;
            $var->answer=$request->answer;
            $var->user_type=$request->user_type;
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
        $orient=Faq::whereId($id)->first();
        $url=$this->redirect_url;
        $title='Frequently Ask Questions';
        $data = [
            ['name'=>'Question',"naming"=>"question" ,"type"=>"text", "attrib"=>'required="required" name="question" maxlength="200"'],
            ['name'=>'Answer', "naming"=>"answer","type"=>"text", "attrib"=>'required="required" name="answer" maxlength="200"'],
            ['name'=>'For Which User Type You Want To Add This Faq ?', 
            "naming"=>"user_type","type"=>"select", "data"=>['seller'=>"Seller",'buyer'=>"Buyer"], "attrib"=>'name="user_type" ']
        ];
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
            $var = Faq::findOrFail($id);
            $var->question = $request->question;
            $var->answer=$request->answer;
            $var->user_type=$request->user_type;
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
            faq::findOrFail($id)->delete();
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
