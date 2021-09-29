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

				<h1 style="text-align: center; font-size: 60px" id="main">Check Worth Of Your Business</h1>


			</div>
		</div>
	</div>
</div>


<!-- form content

=============================================-->
<form action="{{url('add-business')}}" method="POST" enctype="multipart/form-data" id="add-listing">
	@csrf
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
				<input class="account-type-radio" type="radio" name="monetization" id="{{$item->name}}" value="{{$item->id}}"/>
				<label for="{{$item->name}}" class="ripple-effect-dark">{{$item->name}}</label>
			</div>
    </div>
	@endforeach
</div>

																		
	

																		
    </abc>
    <h3>Business Info</h3>
    <abc>
    	
			
      	
      	<div class="submit-field wrap" >
			<div class="row">
				<div class="col-xl-6">
						<span>How many hours do you work a week?</span>
						<input type="number" name="working_hrs" >
				</div>
				<br>
                <div class="col-xl-6">
					<span>What is your company age (in terms of month)?</span>
					<input type="number" name="company_age" onkeyup="myfun()">
                </div>
			
		    </div>							
		<br>
            <div class="row">
				<div class="col-xl-6">
						<span>Enter total number of your unique visitors ?</span>
						<input type="number" name="visitors">
				</div>
				<br>
                <div class="col-xl-6">
					<span>Enter total number of your email subscribers ?</span>
					<input type="number" name="subscribers">
                </div>
			
		    </div>	
<br>
            <div class="row">
				<div class="col-xl-6">
						<span>Enter total number of your revenue channels ?</span>
						<input type="number" name="revenue_channels">
				</div>
			
			
		    </div>	
		
        </div>

    </abc>
    <h3>Revenue Info</h3>
    <abc>
							<div class="submit-field">
								<div class="col-xl-12 col-md-12">
									<div class="section-headline margin-top-25 margin-bottom-12">
								<h5><b>What is your business revenue ?</b></h5>
							</div>
							<input placeholder="$ 0.00" name="revenue" type="number">
						</div>	
                        <br>
								<div class="col-xl-12 col-md-12">
									<div class="section-headline margin-top-25 margin-bottom-12">
								<h5><b>What is your net profit?</b>( Revenue minus expenses )</h5>
							</div>
							<input placeholder="$ 0.00" name="profit" type="number">
						</div>	
				
							
						<br><br><br>				
						</div>
					

    </abc>
    <h3>Result</h3>
    <abc>
    
    	<div class="payment margin-top-30">
<h1>Estimated Cost Of Your Business Is Following.</h1>
<br>
            <h1>$ <span class="counter" id="myresult"></span></h1>
            

</div>

						</div>
					</div>
				</div>

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
            return true;
		}
		if (newIndex == 2) {
          
            var working_hrs = $("input[name=working_hrs]").val();
            var company_age = $("input[name=company_age]").val();
            var visitors = $("input[name=visitors]").val();
            var subscribers = $("input[name=subscribers]").val();
            var revenue_channels = $("input[name=revenue_channels]").val();
            ///
            if(!working_hrs)
			{
				$("input[name=working_hrs]").click();
				Swal.fire(
		        'Error !',
		        'Please enter your working hours per week',
		        'error' 
		       );
				return false;
			}
            //
            if(!company_age)
			{
				$("input[name=company_age]").click();
				Swal.fire(
		        'Error !',
		        'Please enter your company age in terms of month',
		        'error' 
		       );
				return false;
          
			}
              ///
              if(!visitors)
			{
				$("input[name=visitors]").click();
				Swal.fire(
		        'Error !',
		        'Please enter total amount of your unique visitors',
		        'error' 
		       );
				return false;
			}
            //
            if(!subscribers)
			{
				$("input[name=subscribers]").click();
				Swal.fire(
		        'Error !',
		        'Please enter total amount of your subscribers',
		        'error' 
		       );
				return false;
			}
            //
              ///
              if(!revenue_channels)
			{
				$("input[name=revenue_channels]").click();
				Swal.fire(
		        'Error !',
		        'Please enter total amount of your reveue channels ',
		        'error' 
		       );
				return false;
			}
           
return true;            

		}

		if (newIndex == 3) {
          
          var revenue = $("input[name=revenue]").val();
          var profit = $("input[name=profit]").val();
     
			if(!revenue)
			{
				$("input[name=title]").focus();
				Swal.fire(
		        'Error !',
		        'Please enter your business revenue',
		        'error' 
		       );
				return false;
			}
			if(!profit)
			{
				$("input[name=starting_date]").click();
				Swal.fire(
		        'Error !',
		        'Please enter your total profit',
		        'error' 
		       );
				return false;
			}
		
			if(profit >revenue){
			
			    Swal.fire('Error !','Profit must be less than revenue','error' );
			    return false;
			}
		
        return true;
		}
		if (newIndex == 4) {
          
     
		}

		
	},
	



	
	
});
</script>


  
  <!-- Load the JavaScript API client and Sign-in library. -->
  <script src="https://apis.google.com/js/client:platform.js"></script>
  <script>

  function myfun(){
//function to calculate the listing worth--> 	  
    //current formula ==>  (working_hrs x company_age x 20)
    var value1 = $("input[name=working_hrs]").val();
    var value1=parseInt(value1);
    var value2 = $("input[name=company_age]").val();
    var value2=parseInt(value2);
    var results=(value1*value2*20);


    document.getElementById("myresult").innerText=results;
  }
      </script>
@endsection