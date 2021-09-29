
@extends('user.layout.master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2 style="text-align: center;">How can we help you?</h2>


			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container">
	<div class="row">
<!-- 		<div class="row"> -->

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>Welcome to the Sahara Exchange support</h3>
				</div>
			</div>
			
			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-feather-monitor"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Buying Websites</h3>
					<p>Read our blog posts about buying / selling  online businesses.</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-brand-sellsy"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Buy Business</h3>
					<p>See our listing to buy new business</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-feather-message-square"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>FAQ</h3>
					<p>We have extensive frequently asked question areas for both Buyers & Sellers.</p>
				</div>
			</div>



		<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">
<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->
			<section id="contact" class="margin-bottom-60">
				<h1 class="headline margin-top-15 margin-bottom-35">Any questions? Feel free to contact us!</h3>

					<form action="{{url('add-support-ticket')}}" method="post" id="myform">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-md-6">
							<div class="input-with-icon-left">
								<input class="with-border" name="name" type="text" id="name" placeholder="Your Name" value="{{Auth::check() ? auth()->user()->name : ''}}" required="required" readonly="readonly" />
								<i class="icon-material-outline-account-circle"></i>
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-with-icon-left">
								<input class="with-border" name="email_address" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" value="{{Auth::check() ? auth()->user()->email : ''}}"  required="required" readonly="readonly" />
								<i class="icon-material-outline-email"></i>
							</div>
						</div>
					</div>

			
					<div class="input-with-icon-left">
						<input class="with-border" name="subject" type="text" id="subject" placeholder="Subject" required="required" />
						<i class="icon-material-outline-assignment"></i>
					</div>

					<div class="input-with-icon-left">
						<div class="submit-field">
							
							<select class="selectpicker with-border"  title="Select Priority">
								<option>High</option>
								<option>Medium</option>
								<option>Low</option>
							</select>
						</div>
						<i class="icon-material-outline-star"></i>
					</div>

					<div>
						<textarea class="with-border" name="message" cols="40" rows="5" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
					</div>
					<div class="uploadButton margin-top-30">
						<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
						<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
						<span class="uploadButton-file-name">Images or documents that might be helpful in describing your problem.</span>
					</div>	
					<div style="text-align: center;"> 			
					<input type="submit" class="btn btn-block margin-top-15 " id="submit" value="Submit Request"/>
</div>	
				</form>
			</section>

		</div>

	</div>
</div>
<!-- Container / End -->

@endsection
@section('scripts')
<script>
$('#myform').submit(function(e) {
	e.preventDefault();


	var suc_func = function(msg) {
	   Swal.fire(
        'Thanks !',
        'Your Query is received by our support expert ,We will come back shortly  ',
        'success' 
       )
    };
	  fetch2("{{url('add-support-ticket')}}",$('form').serialize(),"POST", "JSON",suc_func, false, false, false);
	  


});
</script> 
@endsection