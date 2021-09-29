@extends('user.layout.master')
@section('content')

<div class="intro-banner dark-overlay big-padding">
	
	<!-- Transparent Header Spacer -->
	<div class="transparent-header-spacer" style="height: 76px;"></div>

	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline-alt">
					<h3>About Us</h3>
					<span>Know More About Sahara Exchange</span>
				</div>
			</div>
		</div>
		
	



	</div>
	
	
	<!-- Video Container -->
	<div class="video-container" data-background-image="{{URL::to('user/images/bg_niche.jpeg')}}" style="background-image: url(&quot;images/bg_picture.jpeg&quot;);">
		<video loop="" autoplay="" muted="">
			<source src="i{{URL::to('user/mages/home-video-background.mp4')}}" type="video/mp4">
		</video>
	</div>

</div>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2 style="text-align: center;">Buying and Selling Online Businesses</h2>


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
			<p style="text-align: center;">At Sahara Exchange, we remove the friction from buying and selling online businesses.
		
			We want to help people buy and sell businesses online.
			<br>
			Our buyers and sellers span the globe and we have fine-tuned our process and team to ensure you have a safe, secure buying and selling experience.
			<br>
			 Our team of industry-leading M&A advisors help entrepreneurs and investors alike with their goals.</p>
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
					<h2>Get Valuation</h2>
					<p>We’ve built this awesome valuation tool that gets
					to the bottom of your site’s value.</p>
                    <a href="{{url('/business-valuation-tool')}}" class="button ripple-effect">Try Now</a>
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
					<h2>View Listing</h2>
					<p>Are you looking to buy business online ?</p>
				<a href="{{url('/listing')}}" class="button ripple-effect">Try Now</a>
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
					<h2>FAQ</h2>
					<p>We have extensive frequently asked question areas for both Buyers & Sellers.</p>
					<a href="{{url('/buyer-faq')}}" class="button ripple-effect">Try Now</a>
				</div>
			</div>



	</div>
</div>
<!-- Container / End -->
<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

@endsection