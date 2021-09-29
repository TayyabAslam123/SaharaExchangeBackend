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
				<h3>My Listings</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>My Listings</li>
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
							<h3><i class="icon-material-outline-business-center"></i> My Listings</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@forelse ($listing as $item)
									
							
								<li id="{{$item->id}}">
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
<!-- 											<a href="#" class="job-listing-company-logo">
												<img src="images/company-logo-05.png" alt="">
											</a> -->

											<!-- Details -->
											<div class="job-listing-description">
												@if($item->status_id==App\Status::INACTIVE)
												<h3 class="job-listing-title"><a href="#">{{$item->title}}</a> <span class="dashboard-status-button red">Pending Approval / Inactive</span></h3>
                                                @else
												<h3 class="job-listing-title"><a href="#">{{$item->title}}</a> <span class="dashboard-status-button green">Active</span></h3>
												@endif
												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-date-range"></i>{{date_frmt($item->created_at)}}</li>
														
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="{{url('listing-details/'.$item->id)}}" class="button ripple-effect" title="View" ><i class="icon-feather-eye"></i> VIEW</a>
										<a href="{{url('edit-business/'.$item->id)}}" class="button gray ripple-effect" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i> EDIT </a>
										<a onclick="deleteme({{$item->id}})" class="button gray ripple-effect" title="Delete" data-tippy-placement="top"><i class="icon-feather-trash-2"></i> DELETE</a>
									</div>
								</li>

								@empty
								<div class="notification error closeable">
									<p>Sorry ! No listing found</p>
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
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
@endsection

@section('scripts')
	
<script>
	function deleteme(id){
	var listing_id=id;
	var _token=$("input[name=_token]").val();
	var info = {_token: _token,my_listing_id:listing_id };
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

  
	var suc_func = function(msg) {
	$("#"+listing_id).hide('slow');
	Swal.fire(
      'Deleted!',
      'Your listing has been deleted.',
      'success'
    )
	 };
	  fetch2("{{url('dashboard/delete-listing')}}",info,"POST", "JSON",suc_func, false, false, false);
	  

  }
})
	}
	</script>	
@endsection