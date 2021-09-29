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
				<h3>Sent Offers</h3>
				

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Sent Offers</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-supervisor-account"></i> Total Offers = {{count($myoffers)}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@forelse ($myoffers as $item)
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
												<h3><a href="#">{{$item->listing->title}} <img class="flag" src="images/flags/au.svg" alt="" title="Australia" data-tippy-placement="top"></a></h3>

										
												 	<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="{{url('listing-details/'.$item->listing->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i>View Listing</a>

												</div>
                                               <h4>Offered Amount: ${{$item->amount}} </h4>
											   <br>
											   <h4>Message Sent:</h4>
											   <p>
												   {{$item->message}}
											   </p>
							
											</div>
										</div>
									</div>
								</li>			
								@empty
								<div class="notification error closeable">
									<p>Sorry ! No Offer Sent</p>
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