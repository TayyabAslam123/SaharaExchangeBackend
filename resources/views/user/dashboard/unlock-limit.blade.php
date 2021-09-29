@extends('user.layout.master') @section('content')
<!-- Dashboard Container -->
<div class="dashboard-container"> @include('user.includes.dashboard-sidebar')
	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner">
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Settings</h3>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('dashboard')}}">Dashboard</a></li>
						<li>Unlock Limit</li>
					</ul>
				</nav>
			</div>
		
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-line-awesome-unlock"></i>Unlock Limit</h3> </div>
						<div class="content with-padding">
							<div class="row">
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Your Unlock Limit (USD)</h5>
										<input type="text" class="with-border" value="{{number_format(auth()->user()->unlock_limit,2)}}" readonly> 
									</div>
								</div>
								
							</div>
						</div>
						<!-- Button -->
						<!--  -->
					</div>
					@if(!auth()->user()->processing_identity_document)
					<div class="dashboard-box">
						<div class="headline">
							<h3><i class="icon-line-awesome-unlock"></i>Submit Documents to Increase Limit</h3> </div>
						<div class="content with-padding">
							<form action="{{url('dashboard/unlock-limit')}}" method="POST" enctype="multipart/form-data">
								<div class="row">
									@if (!auth()->user()->valid_identity_document)
									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Your Government Issued ID CARD</h5>
											<input type="file" class="with-border" name="identity" required> 
										</div>
									</div>
									@endif
									
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Bank Statement</h5>
											<input type="file" class="with-border" name="bank_statement" required> 
										</div>
									</div>
									
								</div>
								@csrf
								<button type="submit" class="button big dark " style="width: 100%;text-align:center;">Upload Documents</button>
							</form>
							</div>
						</div>
						@else
						<h4>Your document are under processing.</h4>
						@endif

				</div>
			</div>
			<!-- Row / End -->
			
		</div>
	</div>
	<!-- Dashboard Content / End -->
</div>
<!-- Dashboard Container / End -->
</div>
<!-- Wrapper / End -->
@endsection 
@section('scripts')


<script>
	$('#password').submit(function(e) {
		e.preventDefault();
		var suc_func = function(msg) {
			Swal.fire('Great !', 'Password updated successfully', 'success')
		};
		var error_func = function(msg) {
				Swal.fire(msg.responseJSON.title, msg.responseJSON.content, 'error')
			}
			fetch2("{{url('dashboard/update-password')}}",$('form').serialize(),"POST", "JSON",suc_func,error_func, false, false);
		// fetch_file_d($("#password").attr('action'), this, "POST", suc_func, error_func, false, false, false);
	});
	</script>

@endsection