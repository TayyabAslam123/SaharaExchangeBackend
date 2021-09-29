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
				<h3>Bookmarks</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Bookmarks</li>
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
							<h3><i class="icon-material-outline-business-center"></i> Bookmarked Listings</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">

							
								@foreach ($bookmarks as $item)
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">
									  <!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="{{url('/listing-details/'.$item->listing->id)}}">{{$item->listing->title}}</a></h3>
                                                
												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-business"></i><b>Industry:</b> {{$item->listing->industry->name}} </li><br>
														<li><i class="icon-material-outline-money"></i><b>Monetization:</b>
															@foreach ($item->listing->monetization as $var)
															<span>{{$var->listing_monetization->name.','}}</span>
															  @endforeach
														</li>
													
														
													</ul>
												</div>
											</div>
										</div>
									</div>
									<!-- Buttons -->
									<div class="buttons-to-right">
										

											<a href="#" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></a>
										
									</div>
								</li>

								@endforeach
							</ul>
						</div>
					</div>
				</div>



		</div>
	</div>
	<!-- Dashboard Content / End -->

@endsection