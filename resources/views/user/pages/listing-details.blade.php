@extends('user.layout.master') 
@section('content')


<!-- Titlebar
================================================== -->
<div class="single-page-header freelancer-header" data-background-image="{{asset('user/images/ship.jpeg')}}">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<!-- 				<div class="header-image freelancer-avatar"><img src="images/user-avatar-big-02.jpg" alt=""></div> -->
						<div class="header-details">
							<h1>{{$listing->title}}<br>
@if(unlocked($listing))
								<br>Industry: {{get_industry_name($listing->industry_id)}}<br>

								@endif
								<br>
								<span>Monetization's:
									@foreach ($listing->monetization as $var)
									{{$var->listing_monetization->name.", "}}
							@endforeach
						</span></h1>
						<br>
							<ul>
								@if(!unlocked($listing))
								<li><button class="button" onclick="unlock_listing({{$listing->id}})">Unlock Listing</button></li>
								@endif
								<!-- <li><div class="star-rating" data-rating="5.0"></div></li> -->
								<!-- <li><img class="flag" src="images/flags/de.svg" alt=""> Germany</li> -->
								<li><div class="verified-badge-with-title">Verified</div></li>
							</ul> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<!-- Content -->
		<div class="col-xl-7 col-lg-7 content-right-offset">
			

					<!-- Page Content -->
					<div class="single-page-section">
						<h3 class="margin-bottom-25"><b>Listing Summary</b></h3>
						<p>{{$listing->description}}</p>
					</div>
			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><b> Work & Skills Required</b></h3> </div>
				<ul class="boxed-list-ul">
					<li>
						<div class="boxed-list-item">
							<!-- Content -->
							<div class="item-content">
								{{ get_listing_info($listing, 'skill_req') }}
							</div>
						</div>
					</li>
				</ul>
				<div class="boxed-list-headline">
					<h3><b> Other Information</b></h3> </div>
				<ul class="boxed-list-ul">
					<li>
						<div class="boxed-list-item">
							<!-- Content -->
							<div class="item-content">
								<ul>
									<li><span><b>Work Required Per Week:</b> {{ get_listing_info($listing, 'work_per_week') }} Hours</span></li>
									<li><span><b>Private Blog Network (PBN):</b> {{ (!get_listing_info($listing, 'work_per_week'))?"No":"Yes" }}</span></li>
									<!-- <li><span><b>Domain Type:</b> .com</span></li> -->
									<li><span><b>Platform:</b> {{ get_listing_info($listing, 'platform') }}</span></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
				<!-- Pagination -->
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>
			<!-- Boxed List / End -->
			
		</div>
		<!-- Sidebar -->
		<div class="col-xl-5 col-lg-5">
			<div class="sidebar-container">
				<!-- Profile Overview -->
				<div class="profile-overview">
					<div class="overview-item"><strong><b>#SE{{$listing->number}}</b></strong><span>Listing Number</span></div>
					<div class="overview-item"><strong><b>${{number_format($listing->price)}}</b></strong><span>Listing Price</span></div>
					<div class="overview-item"><strong><b>{{date_frmt($listing->staring_date)}}</b></strong><span>Starting Date</span></div>
				</div>
				<div class="profile-overview">
					<div class="overview-item"><strong><b>${{number_format($listing->finance->quater_profit)}}</b></strong><span>Quater Profit</span></div>
					<div class="overview-item"><strong><b>${{number_format($listing->finance->biannual_profit)}}</b></strong><span>Biannual Profit</span></div>
					<div class="overview-item"><strong><b>${{number_format($listing->finance->annual_profit)}}</b></strong><span>Annual Profit</span></div>
				</div>
				<!-- Button -->
			
				<div class="profile-overview">
					<div class="overview-item"><a href="#small-dialog-1" class="apply-now-button popup-with-zoom-anim margin-bottom-50">Buy Now <i class="icon-material-outline-arrow-right-alt"></i></a></div>
						@if(Auth::check())
					<div class="overview-item"><a href="#small-dialog" class="apply-now-button popup-with-zoom-anim margin-bottom-50">Make Offer<i class="icon-material-outline-arrow-right-alt"></i></a></div>
				@endif
			</div>
				
				<!-- Freelancer Indicators -->
				<div class="sidebar-widget">
					<div class="freelancer-indicators">
						<!-- Indicator -->
						<div class="col-12">
							<strong>Business Making Money</strong>
							<br> 
							<span>{{date_frmt($listing->making_money_date)}}-({{\Carbon\Carbon::parse($listing->making_money_date)->diffForhumans() }} old)</span> 
						</div>
						<br>
						<div class="col-12">
							<br> <strong>Links</strong>
							<br> 
							@foreach ($listing->urls as $item)
							<ul>
							<li><a href="{{$item->url}}" target="_blank">{{$item->url}}</a>
							</li> 
							</ul>
						@endforeach 
					</div>


					
						<!-- Indicator -->
						<div class="col-12">
							<br>
							<br> <strong><b>Assets Included in the Sale</b></strong>
							<br>
							
							{{ get_listing_info($listing, 'assets') }}
						</div>
						</div>
				</div>
				<!-- Widget -->


				@if(1==0)
				<div class="sidebar-widget">
					<h3>Social Profiles</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
							<li><a href="#" title="Dribbble" data-tippy-placement="top"><i class="icon-brand-dribbble"></i></a></li>
							<li><a href="#" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
							<li><a href="#" title="Behance" data-tippy-placement="top"><i class="icon-brand-behance"></i></a></li>
							<li><a href="#" title="GitHub" data-tippy-placement="top"><i class="icon-brand-github"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- Widget -->
				
			

				@endif
				<div class="sidebar-widget">
					<h3>Attachments (click to download)</h3>
					<div class="attachments-container">
						@foreach ($listing->media as $item)
						<a href="{{Storage::url('public/listing_media/'.$item->name)}}"  class="attachment-box ripple-effect" download><span>-</span><i>{{$item->type}}</i></a>
					@endforeach
					</div>
				</div>
				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					@if(Auth::check())
					<h3>Bookmark or Share</h3>
					<!-- Bookmark Button -->
					<button class="bookmark-button margin-bottom-25 {{checkBookmark($listing->id) ? 'bookmarked': '' }}" onclick="bookmarkme()">
						 <span class="bookmark-icon"></span>
						  <span class="bookmark-text">Bookmark</span>
						   <span class="bookmarked-text">Bookmarked</span>
				   </button>
				   @endif

				   

					<input type="hidden" name="listing_id" value="{{$listing->id}}" id="listing_id" />
					<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
					</div>
					<!-- Share Buttons -->
					<div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content"> <span>Interesting? <strong>Share It!</strong></span>
							<ul class="share-buttons-icons">
								<li><a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" data-button-color="#3b5998" title="Share on Facebook" target="_blank" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/intent/tweet?url={{urlencode(url()->current())}}" data-button-color="#1da1f2" target="_blank" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{trim(url()->current())}}" data-button-color="#0077b5" target="_blank" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Section Headline -->
<div class="col-xl-12">
	<div class="section-headline centered margin-top-0 margin-bottom-45">
		<h1><b>Recommended Businesses</b></h1> <span>Based on similar listing criteria</span> </div>
</div>
<div class="container">
	<div class="row">
		@foreach (get_recom_listing() as $item)
		<div class="col-xl-4">
			<a href="{{url("listing-details/$item->id/".Str::slug($item->title))}}" class="job-listing">

			<!-- Job Listing Details -->
			<div class="job-listing-details">
			

				<!-- Details -->
				<div class="job-listing-description">
					<h3 class="job-listing-company">{{(unlocked($item))?$item->title:$item->industry->name}}<span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h3>

				</div>
			</div>

			<!-- Job Listing Footer -->
			<div class="job-listing-footer">
			
				<ul>

					<li><i class="icon-material-outline-account-balance-wallet"></i> ${{$item->price}}</li>
						<button class="button ripple-effect">
							{{$item->industry->name}}	
							</button>
							<br>
				</ul>
				<div class="task-tags">
					@foreach ($item->monetization as $var)
					<span>{{$var->listing_monetization->name.','}}</span>
					  @endforeach
					</div>
			</div>
		</a>
		</div>

		@endforeach

	






	</div>
</div>
</div>
<!-- Make an Offer Popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
	<!--Tabs -->
	<div class="sign-in-form">
		<ul class="popup-tabs-nav">
			<li><a href="#tab">Make an Offer</a></li>
		</ul>
		<div class="popup-tabs-container">
			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Lets make a offer for this listing</h3> </div>
				<!-- Form -->
				<form action="{{url('/make-offer')}}" method="POST" enctype="multipart/form-data" id="offer"> @csrf
					<input type="hidden" name="listing_id" value="{{$listing->id}}" />
					<div class="input-with-icon-left"> <i class="icon-feather-dollar-sign"></i>
						<input type="number" class="input-text with-border" name="amount" id="emailaddress" placeholder="Offer Amount" /> </div>
					<textarea name="message" cols="10" placeholder="Message" class="with-border"></textarea>
					<!-- Button -->
					<button type="submit" class="button big dark " style="width: 100%;text-align:center;">PLACE OFFER</button>
					</form>
			</div>
			
		</div>
	</div>
</div>
@include('user.partials.buy-now')
<!-- Make an Offer Popup / End -->
<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->@endsection 
@section('scripts')
<script>
$('#offer').submit(function(e) {
	e.preventDefault();
	var suc_func = function(msg) {
		Swal.fire('Great !', 'Offer made successfully', 'success')
	};
	fetch2("{{url('/make-offer')}}", $('form').serialize(), "POST", "JSON", suc_func, false, false, false);
});
</script>
<script type="text/javascript">
	
		$("#buy_now_offer").submit(function(e){
			e.preventDefault();

			var any_type = function(){$(".mfp-close").click()};

			fetch2($(this).attr('action'),$('form').serialize(),"POST", "JSON",any_type, any_type, true, true);


			return false;
		});
	</script>
<script>
function bookmarkme() {
	var listing_id = $("input[name=listing_id]").val();
	var _token = $("input[name=_token]").val();
	var suc_func = function(msg) {
	
	};
	var info = {
		_token: _token,
		my_listing_id: listing_id
	};
	fetch2("{{url('/bookmark')}}", info, "POST", "JSON", suc_func, false, false, false);
}
</script> @endsection