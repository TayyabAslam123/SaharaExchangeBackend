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
			<div class="dashboard-headline">
				<h3>Received Offers</h3>
				

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Received Offers</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						{{-- <div class="headline">
							<h3><i class="icon-material-outline-supervisor-account"></i> Total Offers = 2 </h3>
						</div> --}}

						<div class="content">
							<ul class="dashboard-box-list">
								@forelse ($listings as $item)
								@if($item->offers->count()>0)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="#"><img src="images/user-avatar-big-03.jpg" alt=""></a>
											</div>
											<!-- Name -->
											<div class="freelancer-name">
												<h3><a href="#">{{$item->title}} <img class="flag" src="images/flags/au.svg" alt="" title="Australia" data-tippy-placement="top"></a></h3>
												<!-- Details -->
												<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-list"></i>LISTING # SE{{$item->id}}</a></span><br>
												<span class="freelancer-detail-item"><i class="icon-material-outline-monetization-on"></i>Total Offers ={{$item->offers->count()}} </span> 
												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="{{url('listing-details/'.$item->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> View Listing</a>
													<a href="{{url('/dashboard/view-offers/'.$item->id)}}" class="button dark ripple-effect"><i class="icon-feather-eye"></i> View All Offers</a>

												</div>
											</div>
										</div>
									</div>
								</li>
									@endif
								@empty
								<div class="notification error closeable">
									<p>Sorry ! No Offer found</p>
									<a class="close"></a>
								</div>
								@endforelse

						
					
							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->


		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->
@endsection