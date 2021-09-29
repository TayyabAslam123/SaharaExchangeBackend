<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paymentgateway;
use Session;
use Exception;

class PaymentGatewayController extends Controller
{ 

    private $url='payment-gateway';
    private $redirect_url='admin/payment-gateway';
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Payment Gateway';
        $headings= ["id"=>"Id","name"=>"Name","description"=>"Description","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Paymentgateway::all();
        $url=$this->url;
        $form_data = [['name'=>'Payment Gateway', "type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Description', "type"=>"text", "attrib"=>'required="required" name="description" maxlength="200"']];
       
      
        
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
            $var = new Paymentgateway;
            $var->name = $request->name;
            $var->description = $request->description;
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
        $orient=Paymentgateway::whereId($id)->first();
        $url=$this->redirect_url;
        $title="Payment Gateway";
        $data = [['name'=>'Payment Gateway',"naming"=>"name","type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Description', "naming"=>"description","type"=>"text", "attrib"=>'required="required" name="description" maxlength="200"']];
       
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
            $var = Paymentgateway::findOrFail($id);
            $var->name = $request->name;
            $var->description = $request->description;
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
            Paymentgateway::findOrFail($id)->delete();
            Session::flash('message', 'DELETED SUCCESSFULLY');
            Session::flash('alert-class', 'alert-success'); 
            return redirect($this->url);
        }
            catch(Exception $e)
              {
                
                Session::flash('message', $e->getMessage());
                Session::flash('alert-class', 'alert-danger'); 
                return redirect($this->url);
              }

    }
}
