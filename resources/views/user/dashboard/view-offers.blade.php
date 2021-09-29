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
				<h3>View Offers</h3>
				

				
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-supervisor-account"></i> Total Offers = {{count($offers)}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">

								@foreach ($offers as $item)
									
							
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

										

											<!-- Name -->
											<div class="freelancer-name">
												<h2>{{$item->user->name}} ({{$item->user->email}})</h2>
												<br>
                                                <h4>Offered Amount=  $ {{$item->amount}}</h4> 
												<p><b>Message :</b> {!! $item->message !!}</p> 
											
											</div>
										</div>
									</div>
								</li>
                          
								@endforeach
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