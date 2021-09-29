
@extends('user.layout.master')
@section('content')
<!-- Intro Banner
================================================== -->
<div class="intro-banner dark-overlay big-padding">
	
	<!-- Transparent Header Spacer -->
	<div class="transparent-header-spacer"></div>

	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline-alt">
					<h3>Buy / Sell Business in just few clicks</h3>
					<span>Find the best & profitable Business in the digital industry</span>
				</div>
			</div>
		</div>
		
		<!-- Search Bar -->
		<form action="{{url('/search')}}" method="GET">
			@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="intro-banner-search-form margin-top-95">

					<!-- Select industry -->
					<div class="intro-search-field with-autocomplete">
						<label for="autocomplete-input" class="field-title ripple-effect">Industry</label>
						<div class="input-with-icon">
							<select class="selectpicker" data-live-search="true" multiple title="Select Industry" name="industry[]">
							
					@foreach (get_industry() as $item)
					<option value="{{$item->id}}">{{$item->name}}</option>	
					@endforeach

							</select>
						</div>
					</div>

						<!-- Select monetization -->
						<div class="intro-search-field with-autocomplete">
							<label for="autocomplete-input" class="field-title ripple-effect">Monetization</label>
							<div class="input-with-icon">
								<select class="selectpicker" data-live-search="true" multiple title="Select Monetization" name="monetization[]">
								
						@foreach (get_monetizations() as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>	
						@endforeach
	
								</select>
							</div>
						</div>

					<!-- Button -->
					<div class="intro-search-button">
						<button class="button ripple-effect"  type="submit" id="submit">Search</button>
					</div>
				</div>
			</div>
		</div>
		</form>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter">{{App\Listing::count()}}</strong>
						<span>Business Posted</span>
					</li>
				
					<li>
						<strong class="counter">{{App\User::count()}}</strong>
						<span>Verified Buyers / Sellers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
	
	<!-- Video Container -->
	<div class="video-container" data-background-image="{{URL::to('user/images/bg_picture.jpeg')}}">
		<video loop autoplay muted>
			<source src="{{URL::to('user/images/home-video-background.mp4')}}" type="video/mp4">
		</video>
	</div>

</div>

<!-- Popular Job Categories -->
<div class="section margin-top-65 margin-bottom-30">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>Popular Monetizations</h3>
				</div>
			</div>

			@foreach (get_featured_monetizations() as $item)

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="{{url('search?monetization[]='.$item->id)}}" class="photo-box small" data-background-image="{{asset("/storage/monetization_images/".$item->image)}}">
					<div class="photo-box-content" >
						<h3 style="background-color: black;">{{$item->name}}</h3>
					</div>
				</a>
			</div>

			@endforeach
			

		</div>
	</div>
</div>
<!-- Features Cities / End -->


<!-- Content
================================================== -->
<!-- Features Jobs -->
<div class="section padding-top-65 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Latest Listings</h3>
					<a href="{{url('listing')}}" class="headline-link">Browse All Listing</a>
				</div>
				
				<!-- Jobs Container -->
				<div class="listings-container compact-list-layout margin-top-35">
					
					@foreach (get_latest_listing() as $item)
						
				
					<!--Listing -->
					<a href="{{url('listing-details/'.$item->id)}}" class="job-listing with-apply-button">
						<!--Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
						<!-- 	<div class="job-listing-company-logo">
								<img src="{{URL::to('user/images/company-logo-01.png')}}" alt="">
							</div> -->

							<!-- Details -->
							<div class="job-listing-description">
								<h2 class="job-listing-title"><b>{{(unlocked($item))?$item->title:'Listing #SE'.$item->number}}</b><h2>
<br>
								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>

								
											<h3 class="job-listing-title">		<li><i class="icon-material-outline-business"></i><b><u>Monetizations</u></b><h3>
											@foreach ($item->monetization as $var)
                                                    {{$var->listing_monetization->name.','}}
                                            @endforeach
											<div ></div></li>
										<li><div class="task-tags margin-top-15"><span>{{get_industry_name($item->industry_id)}}</span></div></li>
										<li><i class="icon-material-outline-business-center"></i> Price: ${{$item->price}}</li>
									
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">View Details</span>
						</div>
					</a>	

					@endforeach

					
				
					

				</div>
				<!-- Jobs Container / End -->

			</div>
		</div>
	</div>
</div>
<!-- Featured Jobs / End -->

<!-- Icon Boxes -->
<div class="section padding-top-65 padding-bottom-65">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>How Selling A Business Works ?</h3>
				</div>
			</div>
			
			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-line-awesome-lock"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Create an Account</h3>
					<p>Create your account with Sahara Exchange and complete your profile details</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-line-awesome-legal"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Post a Listing</h3>
					<p>Post a business/listing after completing its details so buyers can view it</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class=" icon-line-awesome-trophy"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Get Buy Request</h3>
					<p>Get offers and buy request from buyers and sell your business in easy steps</p>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Icon Boxes / End -->

<!-- Photo Section -->
<div class="photo-section" data-background-image="{{URL::to('user/images/bg_sales.jpeg')}}">

	<!-- Infobox -->
	<div class="text-content white-font">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12">
					<h2>How to Sale a Business?<br>Get the Full Guide</h2>
					<p>Register your free account today to gain full access to our industry-leading marketplace.</p>
					<a href="pages-pricing-plans.html" class="button button-sliding-icon ripple-effect big margin-top-20">Register/Login <i class="icon-material-outline-arrow-right-alt"></i></a>
				</div>
			</div>

		</div>
	</div>

	<!-- Infobox / End -->

</div>
<!-- Photo Section / End -->


<!-- Recent Blog Posts -->
<div class="section padding-top-65 padding-bottom-50">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-45">
					<h3>From The Blog</h3>
					<a href="{{url('/blog')}}" class="headline-link">View Blog</a>
				</div>

				<div class="row">
					@foreach (get_featured_blog_post() as $item)
					<!-- Blog Post Item -->
					<div class="col-xl-4">
						<a href="{{url('blog-post/'.$item->id)}}" class="blog-compact-item-container">
							<div class="blog-compact-item">
								<img src="{{asset('storage/blog_images/'.$item->image)}}" alt="">
								<span class="blog-item-tag">BLOG POST</span>
								<div class="blog-compact-item-content">
									<ul class="blog-post-tags">
										<li>{{date_frmt($item->created_at)}}</li>
									</ul>
									<h3>{{$item->title}}</h3>
									<p>Distinctively reengineer revolutionary meta-services and premium architectures intuitive opportunities.</p>
								</div>
							</div>
						</a>
					</div>
					<!-- Blog post Item / End -->
					@endforeach

				</div>


			</div>
		</div>
	</div>
</div>
<!-- Recent Blog Posts / End -->



@endsection



@section('scripts')
<script>
	$('#myform').submit(function(e) {
	  e.preventDefault();

 var suc_func = function(msg) {
		$.notify("Searched Successfully", "success");
    };
	  fetch2("{{url('/search-listing')}}",$('form').serialize(),"POST", "HTML",suc_func, false, false, false);


	});
  </script>

@endsection