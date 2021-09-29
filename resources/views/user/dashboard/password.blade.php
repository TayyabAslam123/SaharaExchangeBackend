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
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Update Password</li>
					</ul>
				</nav>
			</div>
		
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-lock"></i> Password & Security</h3> </div>
						<div class="content with-padding">
							<form action="{{url('dashboard/update-password')}}" method="POST" id="password">
							<div class="row">
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Current Password</h5>
										<input type="password" class="with-border" name="current_password"> </div>
								</div>
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>New Password</h5>
										<input type="password" class="with-border" name="new_password"> </div>
								</div>
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Repeat New Password</h5>
										<input type="password" class="with-border" name="new_confirm_password"> </div>
								</div>
								
							</div>
						</div>
						<!-- Button -->
						<button type="submit" class="button big dark " style="width: 100%;text-align:center;">Save Changes</button>
					</form>
					</div>

				</div>
			</div>
			<!-- Row / End -->
			
		</div>
	</div>
	<!-- Dashboard Content / End -->
</div>
<!-- Dashboard Container / End -->
</div>
<!-- Wrapper / End -->@endsection @section('scripts')


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