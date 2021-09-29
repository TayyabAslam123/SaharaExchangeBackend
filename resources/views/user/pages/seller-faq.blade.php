@extends('user.layout.master')

@section('content')


<!-- Titlebar
================================================== -->
<div class="intro-banner dark-overlay big-padding">
	
	<!-- Transparent Header Spacer -->
	<div class="transparent-header-spacer" style="height: 76px;"></div>

	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline-alt">
					<h3>Frequently Asked Questions (FAQ) from Sellers</h3>
					<span>Make Selling A Business Easy With Sahara Exchange</span>
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
<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

<!-- Page Content
================================================== -->
  <div class="container">
  	<div class="row">
  	<div class="col-xl-12">
  		<h2 style="text-align: center;">FAQ'S for Selling Businesses</h2><br>
  <div class="accordion js-accordion">

	@foreach ($data as $item)
		

	<!-- Accordion Item -->
	<div class="accordion__item js-accordion-item">
	<div class="accordion-header js-accordion-header">{{$item->question}}</div> 

		<!-- Accordtion Body -->
		<div class="accordion-body js-accordion-body" style="display: none;">

			<!-- Accordion Content -->
			<div class="accordion-body__contents">
				{{$item->answer}}
			</div>

		</div>
		<!-- Accordion Body / End -->
	</div>
	<!-- Accordion Item / End -->

	@endforeach

			</div>
		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->
    
@endsection