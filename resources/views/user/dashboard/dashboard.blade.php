@extends('user.layout.master')
@section('content')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">


@include('user.includes.dashboard-sidebar')

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline ">
				<h3>Howdy, {{auth()->user()->name}}</h3>
				<span>We are glad to see you again!</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Dashboard</li>
					</ul>
				</nav>
			</div>
	
			<!-- Fun Facts Container -->
			<div class="container ">
				<div class="row">
				<div class="fun-fact col-sm-6" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span>My Total Listings</span>
						<h4>{{myListingCount()}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				<div class="fun-fact col-sm-6" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						<span>Placed Offers</span>
						<h4>{{App\Offer::where('buyer_id',auth()->user()->id)->count()}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>
				</div>
			

			</div>
			

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-6">
					<div class="dashboard-box">
						<div class="headline">
							<h3><i class="icon-material-baseline-notifications-none"></i>Recent Activities Related Offers</h3>
						
						</div>
					
						<div class="content">
							<ul class="dashboard-box-list">
								
								@forelse (myoffers() as $item)
							
								@if($item->buyer_id==auth()->user()->id)
								<li>
									<span class="notification-icon"><i class="icon-material-outline-check"></i></span>
									<span class="notification-text">
									You have placed a offer on <b><a href="{{url('listing-details/'.$item->id)}}">{{$item->listing->title}}</a></b><br>
									<b>Amount: ${{$item->amount}}</b>
									</span>
								</li>
								@endif

								@if($item->listing->user_id==auth()->user()->id)

								<li>
									<span class="notification-icon"><i class="icon-material-outline-check"></i></span>
									<span class="notification-text">
									You have got a offer on <b><a href="{{url('listing-details/'.$item->id)}}">{{$item->listing->title}}</a></b><br>
									<b>Amount: ${{$item->amount}}</b>
									</span>
								</li>

								@endif
								
								@empty
								<div class="notification error closeable">
									<p>No Activity</p>
									<a class="close"></a>
								</div>	
								@endforelse
							</ul>
						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-6">
					<div class="dashboard-box">
						<div class="headline">
							<h3><i class="icon-material-outline-assignment"></i>Recent Activities Related Listings</h3>
						</div>
						<div class="content">
							<ul class="dashboard-box-list">
								@forelse(myListings() as $item)
								<li>
									<div class="invoice-list-item">
									<strong>
										You have added new listing <b>{{$item->title}}</b> of price
										 <b>${{$item->price}}</b></strong>
										<ul>
											<li><a href="{{url('listing-details/'.$item->id)}}"><span class="paid">VIEW</span></a></li>
											<li>Listing #:SE{{$item->id}}</li>
											<li>Date:{{date_frmt($item->created_at)}}</li>
										</ul>
									</div>
								
								</li>
							@empty
							<div class="notification error closeable">
								<p>No Activity</p>
								<a class="close"></a>
							</div>	
					
							@endforelse
							
							
							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="dashboard-footer-spacer"></div>
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					&copy; {{date('Y')}}  <strong>Sahara Exchange</strong>. All Rights Reserved.
				</div>
					<!-- Widget -->
					<div class="sidebar-widget">
						<h3>Social Profiles</h3>
						<div class="freelancer-socials margin-top-25">
							<ul>
								@foreach(social_links() as $val)
							<li><a href="{{$val->url}}" title="{{$val->name}}" data-tippy-placement="top"><i class="icon-brand-{{$val->name}}"></i></a></li>
					             @endforeach
							</ul>
						</div>
					</div>
			
			</div>
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Add Note</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Do Not Forget 😎</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="add-note">

					<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
						<option>Low Priority</option>
						<option>Medium Priority</option>
						<option>High Priority</option>
					</select>

					<textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Apply for a job popup / End -->

@endsection