@extends('admin-panel.layout.master')
@section('content')
@include('admin-panel.includes.message')

   <!-- ============================= ADD NEW FORM ================================= -->

   <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
        <h2 class="section-title">Edit Listing</h2>
        </div>
        <div class="card">
         <div class="card-body">
     
        
          <form action="{{url('admin/listing/'.$listing->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <h3>General Information</h3>

            <div class="form-group">
                <label for="input-select">Status</label>
                <select class="form-control" id="input-select" name="status_id">
                    @foreach (get_status() as $item)
                    <option value="{{$item->id}}" {{is_selected($item->id, $listing->status_id)}}>{{$item->status}}</option>
                    </label>
                @endforeach  
                </select>
            </div>
            <!--title-->
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Title</label>
                <input id="inputText3" type="text" name="title" value="{{$listing->title}}" class="form-control">
            </div>
            <!--details-->
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Details</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="description">{{$listing->description}}</textarea>
            </div>
            <!--price-->
            <label for="exampleFormControlTextarea1">Price</label>
            <div class="input-group mb-3">
               
                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                <input type="text" class="form-control" name="price" value="{{$listing->price}}">
            </div>

            <!--starting and make money date-->
            <div class="row">
             <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Business Staring date </label>
                    <input id="inputText3" type="date" class="form-control" name="starting_date" value="{{$listing->staring_date}}">
                </div>
             </div>
             <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Started Making Money Date</label>
                    <input id="inputText3" type="date" class="form-control" name="making_money" value="{{$listing->making_money_date}}">
                </div>
             </div>

            </div>    
        <!--end-->    
        

           <!--Industry-->
           <div class="row">
            <div class="col-sm-12">
             <div class="card-body border-top">
                    <h3>Choose A Relevent Industry</h3>
                    @foreach (get_Industry() as $item)
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="industry_id" value="{{$item->id}}" class="custom-control-input" {{is_checked($item->id, $listing->industry_id)}}><span class="custom-control-label">{{$item->name}}</span>
                        </label>
                    @endforeach    
             </div>
             </div>
        </div>    
         <!--end-->    
       
           <!--Monetization-->
           <div class="row">
            <div class="col-sm-12">
             <div class="card-body border-top">
                    <h3>Select Monetization's</h3>
                    @foreach (get_monetizations() as $item)
                    <label class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox"  class="custom-control-input" name="monetization[]" value="{{$item->id}}" {{is_checked($listing->monetization->pluck('monetization_id')->toArray(), $item->id)}}><span class="custom-control-label">{{$item->name}}</span>
                    </label>
                    @endforeach    
             </div>
             </div>
        </div>    
         <!--end--> 
          <hr>
          <h3>Finances</h3>
          <br>
         <!--Finances-->
         <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Quater Profit</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                  <input type="number" class="form-control" name="quater_profit" value="{{$listing->finance->quater_profit}}">
              </div>
             </div>
        </div>   

     <div class="row">
        <div class="col-sm-6">
        <label for="exampleFormControlTextarea1">Biannual Profit</label>
        <div class="input-group mb-3">
              <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                  <input type="number" class="form-control" name="biannual_profit" value="{{$listing->finance->biannual_profit}}">
              </div>
             </div>
        </div>  

      <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Annual Profit</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                  <input type="number" class="form-control" name="annual_profit" value="{{$listing->finance->annual_profit}}">
              </div>
             </div>
        </div>  
<!--end finances-->

      <hr>

      <h3>Add Relevent Documents </h3>
      <input type="file" id="files" name="files[]" multiple>
<br>
<hr>


<!--url-->
<h3>Add Related Url's</h3>
<div class="url_field">
  <div class="row">
    <div class="col-sm-11">
    <br>
    <button class="btn btn-success" id="add_field_button">Add More</button>
    <div class="input-group mb-3">
      @foreach($listing->urls as $url)
           <input type="url" class="form-control" name="url[]" value="{{$url->url}}">
      @endforeach
     <input type="url" class="form-control" name="url[]" >
      </div>
     </div>
   </div> 
</div>
<!---->
<hr>

 <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Work & Skills Required</label>
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend"><span class="input-group-text">$</span></div> -->
                  <textarea class="form-control" name="skill_required">{{get_listing_info($listing,'skill_req')}}</textarea>
              </div>
             </div>
        </div> 
        <!-- work_per_week -->
         <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Work per week hours</label>
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend"><span class="input-group-text">$</span></div> -->
                  <input type="number" min="0" max="168" class="form-control" name="work_per_week" value="{{get_listing_info($listing,'work_per_week')}}">
              </div>
             </div>
        </div> 
        <!-- platform -->
        <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Platform</label>
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend"><span class="input-group-text">$</span></div> -->
                  <input  class="form-control" name="platform" value="{{get_listing_info($listing,'platform')}}">
              </div>
             </div>
        </div> 
        <!-- pbn -->
         <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Private Blog Network</label>
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend"><span class="input-group-text">$</span></div> -->
                  <input type="checkbox" class="form-control" name="pbn" {{is_checked(get_listing_info($listing,'pbn'), "on")}}>
              </div>
             </div>
        </div> 
        <!-- assets -->
        <div class="row">
            <div class="col-sm-6">
            <label for="exampleFormControlTextarea1">Assets Included in sale</label>
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend"><span class="input-group-text">$</span></div> -->
                  <textarea class="form-control" name="assets">{{get_listing_info($listing,'assets')}}</textarea>
              </div>
             </div>
        </div>  



<input type="hidden" name="_method" value="PUT">

          <button type="submit" class="btn btn-primary btn-lg ">Update</button>
          </form>
    

          </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<!--add more links -->
<script>
    $(document).ready(function() {
	var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $(".url_field"); //Fields wrapper
	var add_button      = $("#add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div class="input-group mb-3"><input type="url" name="url[]" class="form-control"><a href="#" class="remove_field btn btn-danger">X</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
    </script> 
<!--end-->    
@endsection

<!-- ============================================================== -->
