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
			
		
			<form action="{{url('/open-ticket')}}" method="post" id="myform">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-feather-folder-plus"></i>Add Ticket</h3>
						</div>

						<div class="content with-padding padding-bottom-10">
							<div class="row">

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Name</h5>
										<input type="text" class="with-border" name="name" value="{{auth()->user()->name}}">
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Email</h5>
										<input type="email" class="with-border" name="email_address" value="{{auth()->user()->email}}">
									</div>
								</div>

                                <div class="col-xl-12">
									<div class="submit-field">
										<h5>Subject</h5>
										<input type="text" class="with-border" name="subject">
									</div>
                                </div>
                                
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Priority</h5>
										<select class="selectpicker with-border" data-size="7" title="Select Priority" name="priority">
											<option value="high">High</option>
											<option value="medium">Medium</option>
											<option value="low">Low</option>
										</select>
									</div>
								</div>

							

							

								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Description</h5>
										<textarea cols="30" rows="5" class="with-border" name="message"></textarea>
										<div class="uploadButton margin-top-30">
											<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
											<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
											<span class="uploadButton-file-name">Images or documents that might be helpful in describing your job</span>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i>Add Ticket</button>
				</div>

			</div>
			<!-- Row / End -->

		
			</form>
		</div>
	</div>
    <!-- Dashboard Content / End -->
</div>
@endsection

@section('scripts')
<script>
	$('#myform').submit(function(e) {
	e.preventDefault();
	  var suc_func = function(msg) {
		  
		  Swal.fire(
		  'Great !',
		  'Ticket opened successfully',
		  'success' 
		 )
	  };
		fetch2("{{url('dashboard/open-ticket')}}",$('form').serialize(),"POST", "JSON",suc_func, false, false, false);
		
	});
  </script>
@endsection