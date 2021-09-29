@extends('user.layout.master')

@section('head')
<meta name="google-signin-client_id" content="32091754858-6h43fcmdj03vvhsvejlmn8n27vdbu2l4.apps.googleusercontent.com">
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/analytics.readonly">
@endsection

@section('content')


<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1 style="text-align: center; font-size: 60px">Sell Your Site (EDIT)</h1>


			</div>
		</div>
	</div>
</div>


<!-- form content

=============================================-->
<form action="{{url('edit-business')}}" method="POST" enctype="multipart/form-data" id="add-listing">
	@csrf
<input type="hidden" name="id" value="{{$listing->id}}">	
<div class="container">
	<div class="row">
		
		<div class="col-xl-12">
			<div id="example-form">
    <h3>Select Monetization </h3>
    <abc>
    	<!--alert box-->

	<div class="notification warning closeable">

		<p>	<i class="icon-material-outline-info"></i> Please select any / all monetization according to your business</p>
			<a class="close" href="#"></a>
    </div>

        <div class="row">
    @foreach (get_monetizations() as $item)
   <div class="account-type col-3">
			<div>
				<input class="account-type-radio" type="checkbox" name="monetization[]" id="{{$item->name}}"  value="{{$item->id}}" {{is_checked($listing->monetization->pluck('monetization_id')->toArray(), $item->id)}}/>
				<label for="{{$item->name}}" class="ripple-effect-dark">{{$item->name}}</label>
			</div>
    </div>
	@endforeach
</div>

																		
	</abc>
	<h3>Select Industry </h3>
    <abc>
    	<!--alert box-->

	<div class="notification warning closeable">

		<p>	<i class="icon-material-outline-info"></i> Please select a Industry which is according to your business.</p>
			<a class="close" href="#"></a>
    </div>
    <div class="row">
    @foreach (get_industry() as $item)
   <div class="account-type col-3">
			<div>
				<input class="account-type-radio" type="radio" name="industry_id" id="{{$item->name}}" value="{{$item->id}}" {{is_checked($item->id, $listing->industry_id)}}/>
				<label for="{{$item->name}}" class="ripple-effect-dark">{{$item->name}}</label>
			</div>
    </div>
	@endforeach
	</div>

																		
    </abc>
    <h3>Your Business Details</h3>
    <abc>
    	
			<div class="notification warning closeable">

				<p>	<i class="icon-material-outline-info"></i> Link to your KDP / FBA store if you don't have a website.</p>
				<a class="close" href="#"></a>
			</div>
      	
      	<div class="submit-field wrap" >
			<div class="row">
				<div class="col-xl-6">
						<span>When was the business title?</span>
						<input type="text" name="title" value="{{$listing->title}}">
				</div>
				<br>
			
				</div>	
       
		<div class="row">
			<div class="col-xl-6">
					<span>When was the business first started?</span>
					<input type="date" name="starting_date" value="{{$listing->staring_date}}">
			</div>
			<br>
			<div class="col-xl-6">
					<span>When did the business first start making money?</span>
					<input type="date" name="making_money" value="{{$listing->making_money_date}}">
				</div>
			</div>						
		<div class="row">
			<div class="col-xl-12">
				<div class="keyword-input-container" >
				@foreach($listing->urls as $url)	
				<input type="url" class="keyword-input" placeholder="Add URL" name="url[]" value="{{$url->url}}"/>
				@endforeach
				<button class="keyword-input-button ripple-effect" id="add_field_button"><i class="icon-material-outline-add"></i></button>
				</div>
				<div class="clearfix"></div>				
				</div>
			</div>
		
        </div>

    </abc>
    <h3>Let's Talk Income</h3>
    <abc>
							<div class="submit-field">
								<div class="col-xl-12 col-md-12">
									<div class="section-headline margin-top-25 margin-bottom-12">
								<h5><b>What is your business price ?</b></h5>
							</div>
							<input placeholder="$ 0.00" name="price" type="number" value="{{$listing->price}}">
						</div>	
								<div class="col-xl-12 col-md-12">
									<div class="section-headline margin-top-25 margin-bottom-12">
								<h5><b>What is your profit in last 4 months (Quarterly Profit) ?</b>( Revenue minus expenses )</h5>
							</div>
							<input placeholder="$ 0.00" name="quater_profit" type="number" value="{{$listing->finance->quater_profit}}">
						</div>	
				
							<div class="col-xl-12 col-md-12">
									<div class="section-headline margin-top-25 margin-bottom-12">
								<h5><b>What is your profit in last year (Annual Profit) ?</b>(Revenue minus expenses )</h5>
							</div>
							<input placeholder="$ 0.00" name="annual_profit" type="number" value="{{$listing->finance->biannual_profit}}">
						</div>	
				
							<div class="col-xl-12 col-md-12">
									<div class="section-headline margin-top-25 margin-bottom-12">
										<h5><b>What is your profit in last 2 years (Biannual Profit) ?</b>( Revenue minus expenses )</h5>
							</div>
							<input placeholder="$ 0.00" name="biannual_profit" type="number" value="{{$listing->finance->annual_profit}}">
						</div>	
						<br><br>	<br><br>				
						</div>
					

    </abc>
    <h3>Your Tracking Info</h3>
    <abc>
    	<span><b>Do you currently have either Google Analytics or Clicky Installed?</b><br>If your business doesn't have a website included (FBA businesses, for example) select N/A.</span>
    	<div class="payment margin-top-30">

				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input checked="" id="paypal" name="cardType" type="radio" value="paypal">
						<label for="paypal">No</label>
						
					</div>
				</div>


				<div class="payment-tab">
					<div class="payment-tab-trigger">
						<input type="radio" name="cardType" id="creditCart" value="creditCard">
						<label for="creditCart">Yes</label>
						
					</div>

					<div class="payment-tab-content">
						<div class="row payment-form-row">
							<div class="col-xl-12">	<span><b>Connect Your Google Analytics Account With Sahara Exchange.</b></span>

<div style="text-align: center;">
			{{-- <a href="#" class="button ripple-effect" >Connect to Google Analytics </a> --}}
			<p class="g-signin2" data-onsuccess="queryReports"></p>
</div>
<br><br>
<div id="myresult">
</div>

</div>

						</div>
					</div>
				</div>

			</div>
    </abc>
  <h3>Extra Information</h3>
    <abc>
    	<div class="row">
			<div class="col-12">
    	    	<span>Briefly tell us about your business.</span>

			<div class="notification warning closeable">

				<p>	<i class="icon-material-outline-info"></i> Please make sure your answer is at least 50 characters long.</p>
				<a class="close" href="#"></a>
		</div>
		<textarea name="description" placeholder="Challenges, need to know things, business success and profile or anything related to listing." height="6rem" class="TextArea__TextareaStyled-ekrhIz ekDYrB" required>{{$listing->description}}</textarea>

	</div>
	<div class="col-6">
		<span>Work & Skills Required</span>

		<textarea name="skill_required" placeholder="Skill Required to operate this business" height="6rem" class="TextArea__TextareaStyled-ekrhIz ekDYrB" required>{{get_listing_info($listing,'skill_req')}}</textarea>
</div>
<div class="col-6">
    	    	<span>Assets Included in the Sale</span>

			
		<textarea name="assets" placeholder="What assets this sale will include" height="6rem" class="TextArea__TextareaStyled-ekrhIz ekDYrB" required>{{get_listing_info($listing,'assets')}}</textarea>

	</div>	
<div class="col-6">
		<span>How Much Work per Week Required? (in Hours)</span>
		<!-- maximum work in a week is 168 = 24 hrs x 7 days -->
		<input type="number" min="0" class="form-control" name="work_per_week" max="168" value="{{get_listing_info($listing,'work_per_week')}}" required>
</div>
<div class="col-3">
		<span>Private Blog Network (PBN)</span>
		<input type="checkbox" value="true" class="form-control" name="pbn" {{is_checked(get_listing_info($listing,'pbn'), "on")}}> 
</div>
<div class="col-3">
		<span>Platform</span>
		<input type="text" min="0" class="form-control" name="platform" placeholder="Platform (if applicable)" value="{{get_listing_info($listing,'platform')}}">
</div>
<div class="col-3"></div>
</div>		

		
	</abc>
	
	<h3>Attachments</h3>
    <abc>
    	    	<div class="notification warning closeable">

				<p>	<i class="icon-material-outline-info"></i> Attach any images or documents that might be helpful in describing your problem.</p>
				<a class="close" href="#"></a>
		</div>

				<div class="uploadButton margin-top-30">
					<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" name="attachments[]" multiple/>
					<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
					<span class="uploadButton-file-name"></span>
				</div>
			
  
	</abc>
     <h3>Confirmation</h3>
    <abc>
    	<div class="col-xl-12">
    		<div class="checkbox">
				<input type="checkbox" id="chekcbox1">
				<label for="chekcbox1"><span class="checkbox-icon"></span>
    		<span>I understand and agree to the Term of Use. I understand these Terms of Use contain important provisions on the entire process to buy or sell a business through Sahara Exchange, including:</span>
    		<ul>
    			<li>Listing a business for sale, including the Listing Price.</li>
    			<li>Granting Sahara Exchange the exclusive right to sell the business.
    			</li>
    			<li>Accepting offers to purchase the business.</li>
    			<li>The process for Buyers to obtain Confidential Information about a Seller’s business.</li>
    			<li>Payment of the Commission owed to Sahara Exchange.</li>
    			<li>Transfer of the business to a Buyer.</li>
    			<li>Non-compete provisions.</li>
    			<li>Release of the Purchase Price, including verifying the Seller’s identity.</li>
    		</ul>
			</div>
    </div>
			<div class="notification warning closeable">
				<p>	<i class="icon-material-outline-info"></i> Please accept the General Terms of Use to finish.</p>
				<a class="close" href="#"></a>
		</div>
    </abc>
</div>
		</div>
	</div>
</div>
</form>
<br><br><br>

<!-- Page Content
================================================== -->

    
@endsection

@section('scripts')
<script>
	function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}
$("#example-form").steps({
    headerTag: "h3",
    bodyTag: "abc",
    transitionEffect: "slideLeft",
	autoFocus: true,

	onStepChanging: function(event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        // if (currentIndex > newIndex) {
        //     return true;
		// }
		
		
		if (newIndex == 1) {
          

			if(!$("input[name^=monetization]:checked").val())
			{
				
				Swal.fire(
		        'Error !',
		        'Please select atleast one monetization',
		        'error' 
		       );

				return false;
				
				
			}
			//$("html, body").animate({ scrollTop: 0 }, "slow");
		}
		if (newIndex == 2) {
          

			if(!$("input[name^=industry_id]:checked").val())
			{
				Swal.fire(
		        'Error !',
		        'Please select Industry',
		        'error' 
		       );
				return false;
			}
		}

		if (newIndex == 3) {
          
          var starting_date = $("input[name=starting_date]").val();
          var money_date = $("input[name=making_money]").val();
          var today = Date();
			if(!$("input[name=title]").val())
			{
				$("input[name=title]").focus();
				Swal.fire(
		        'Error !',
		        'Please enter Business Name',
		        'error' 
		       );
				return false;
			}
			if(!starting_date)
			{
				$("input[name=starting_date]").click();
				Swal.fire(
		        'Error !',
		        'Please enter Business Start Date',
		        'error' 
		       );
				return false;
			}
			if(!money_date)
			{
				$("input[name=making_money]").click();
				Swal.fire(
		        'Error !',
		        'Please enter Business Started Money Making',
		        'error' 
		       );
				return false;
			}
			if(Date.parse(money_date)>=Date.parse(today)){
				$("input[name=making_money]").click();
			    Swal.fire('Error !','Business Money Earning DateMust be before or today','error' );
			    return false;
			}
			if(Date.parse(starting_date)>=Date.parse(today)){
				$("input[name=starting_date]").click();
			    Swal.fire('Error !','Business Start Date Must be before or today','error' );
			    return false;
			}
			if(Date.parse(starting_date)>=Date.parse(money_date)){
				$("input[name=starting_date]").click();
			    Swal.fire('Error !','Business Date Must be before than money making date','error' );
			    return false;
			}
			var x = true;
			$("input[name^=url]").each(function(i, dd){
				if (!isUrlValid($(dd).val()))
				{
					$(this).focus();
					Swal.fire('Error !','Please enter a valid url','error' );
			    	x = false;
				}
			});
			return x;
		}
		if (newIndex == 4) {
			var x = true;
			$('input[name=price], input[name=quater_profit], input[name=annual_profit], input[name=biannual_profit]').each(function() {
			  if (!parseFloat($(this).val())) {
			  	$(this).focus();
			    Swal.fire('Error !','Please check input','error' );
			    x = false;
			  }
			  
			});
			return x;
		}

		if (newIndex == 6)
		{
			if (!$("[name=description]").val().trim())
			{
				$("[name=description]").focus();
				Swal.fire('Error !','Please check Briefly tell us about your business.','error' );
				return false;
			}

			if (!$("[name=skill_required]").val().trim())
			{
				$("[name=skill_required]").focus();
				Swal.fire('Error !','Please check Work & Skills Required','error' );
				return false;
			}

			if (!$("[name=assets]").val().trim())
			{
				$("[name=assets]").focus();
				Swal.fire('Error !','Please check Assets Included in the Sale','error' );
				return false;
			}

			if($("[name=description]").val().length < 50)
			{
				$("[name=description]").focus();
				Swal.fire('Error !','Atleast 50 characters required','error' );
				return false;
			}
		}

		return true;
	},
	


onFinished: function(event) {
      
	  
	var suc_func = function(msg) {
		
		Swal.fire(
        'Great !',
        'Your listing updated successfully , Kindly wait for the approval',
        'success' 
       );
		return window.location = "{{url('dashboard/seller-listing')}}";
    };

    var error_func = function(msg) {
    	var message = "";
		if (!$.isEmptyObject(msg.responseJSON.errors))
		{


			 var response = JSON.parse(msg.responseText);
	        $.each( response.errors, function( key, value) {
	            message += value + '<br>';
	        });
			}
		if (!message)
		{
			message = "Inputs Missing in Extra Information Tab";
		}
		Swal.fire(
        'Error !',
        message,
        'error' 
       );
    };
	  //fetch2("{{url('add-business')}}",$('form').serialize(),"POST", "JSON",suc_func, error_func, false, false);
	 fetch_file_d($("#add-listing").attr('action'), $("form#add-listing")[0], "POST", suc_func, error_func, false, false, false);
 
	}
	
	
});
</script>

<script>
    $(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".wrap"); //Fields wrapper
	var add_button      = $("#add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div class="input-group mb-3"><input type="url" placeholder="Add URL" name="url[]" class="form-control"><a href="#" class="button small dark ripple-effect" id="remove">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click","#remove", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
	</script> 
	
<script>
	// Replace with your view ID.
	var VIEW_ID = '202244165';
  
	// Query the API and print the results to the page.
	function queryReports() {
	  gapi.client.request({
		path: '/v4/reports:batchGet',
		root: 'https://analyticsreporting.googleapis.com/',
		method: 'POST',
		body: {
		  reportRequests: [
			{
			  viewId: VIEW_ID,
			  dateRanges: [
				{
				  startDate: '180daysAgo',
				  endDate: 'today'
				}
			  ],
			  metrics: [
				{
				  // expression: 'ga:sessions',
				   expression:'ga:users',
				  // expression:'ga:pageviewsbypage',
				  
				 // expression:'ga:pageLoadTime',
  
				}
			  ]
			}
		  ]
		}
	  }).then(displayResults, console.error.bind(console));
	}
  
	function displayResults(response) {
	  var results=response.result.reports[0].data.maximums[0].values[0];
	  document.getElementById("myresult").innerHTML="<h3>Your data fetched successfully your visitors for last 6 months are ="+results+"</h3>";
	  var formattedJson = JSON.stringify(response.result, null, 2);
	  document.getElementById('query-output').value = formattedJson;
	  console.log(formattedJson[0].data);
	}
  </script>
  
  <!-- Load the JavaScript API client and Sign-in library. -->
  <script src="https://apis.google.com/js/client:platform.js"></script>
@endsection