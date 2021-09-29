<div id="footer">
	
	<!-- Footer Top Section -->
	<div class="footer-top-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">

					<!-- Footer Rows Container -->
					<div class="footer-rows-container">
						
						<!-- Left Side -->
						<div class="footer-rows-left">
							<div class="footer-row">
								<div class="footer-row-inner footer-logo">
									<img src="{{URL::to('user/images/logov3.png')}}" alt="">
								</div>
							</div>
						</div>
						
						<!-- Right Side -->
						<div class="footer-rows-right">

							<!-- Social Icons -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<!--social links-->
									<ul class="footer-social-links">
										@foreach(social_links() as $val)
									
										@if($val->name=="facebook")
										<li>
										<a href="{{$val->url}}" target="_blank" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-facebook-f"></i>
											</a>
										</li>
										@endif

										@if($val->name=="instagram")
										<li>
											<a href="{{$val->url}}" target="_blank" title="Instagram" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-instagram"></i>
											</a>
										</li>
										@endif

										@if($val->name=="twitter")
										<li>
											<a href="{{$val->url}}" target="_blank" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-twitter"></i>
											</a>
										</li>
										@endif

										@if($val->name=="youtube")
										<li>
											<a href="{{$val->url}}" target="_blank" title="Youtube" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-youtube"></i>
											</a>
										</li>
										@endif
										@if($val->name=="google-plus")
										<li>
											<a href="{{$val->url}}" target="_blank" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-google-plus-g"></i>
											</a>
										</li>
										@endif
										@if($val->name=="linkedin")
										<li>
											<a href="{{$val->url}}" target="_blank" title="Linkedin" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-linkedin-in"></i>
											</a>
										</li>
										@endif
										@endforeach
										
									</ul>
									<!--end-->
									<div class="clearfix"></div>
								</div>
							</div>
							
							<!-- Language Switcher -->
							{{-- <div class="footer-row">
								<div class="footer-row-inner">
									<select class="selectpicker language-switcher" data-selected-text-format="count" data-size="5">
										<option selected>English</option>
										<option>Français</option>
										<option>Español</option>
										<option>Deutsch</option>
									</select>
								</div>
							</div> --}}
						</div>

					</div>
					<!-- Footer Rows Container / End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top Section / End -->

	<!-- Footer Middle Section -->
	<div class="footer-middle-section">
		<div class="container">
			<div class="row">

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>For Sellers</h3>
						<ul>
						<li><a href="{{url('seller-faq')}}"><span>Seller Faq's</span></a></li>
						
			
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>For Buyers</h3>
						<ul>
							<li><a href="{{url('listing')}}"><span>View Listings</span></a></li>
							<li><a href="{{url('buyer-faq')}}"><span>Buyer Faq's</span></a></li>
						
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Helpful Links</h3>
						<ul>
							<li><a href="{{url('about-us')}}"><span>About us</span></a></li>
							<li><a href="{{url('support')}}"><span>Support</span></a></li>
							
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Account</h3>
						<ul>
							
							<li><a href="{{url('dashboard')}}"><span>My Account</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Newsletter -->
				<div class="col-xl-4 col-lg-4 col-md-12">
					<h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
					<p>Get updates from Sahara Exchange.</p>
				<form action="{{url('admin/subscribers')}}" method="post" class="newsletter" id="subscribe">
					
					<input type="email" name="email" placeholder="Enter your email address">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
						<button type="submit"><i class="icon-feather-arrow-right"></i></button>
					</form>
				</div>
			</div>
		</div>
    </div>
    	<!-- Footer Copyrights -->
	<div class="footer-bottom-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					&copy; {{date('Y')}} <strong>Sahara Exchange</strong>. All Rights Reserved.<p>Powered By <a href="https://promaxworld.com/" target="_blank">ProMaxWorld.com</a></p>

				</div>
			</div>
		</div>
	</div>
	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

