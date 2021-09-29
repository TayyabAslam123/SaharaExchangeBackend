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
		<div class="dashboard-content-inner">
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>TICKET # {{$data->id}}<br>SUBJECT : {{$data->subject}}</h3> </div>
			<!-- Row -->
			<form action="{{url('/reply-ticket')}}" method="post" id="myform">
			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$data->id}}" name="ticket_id">
			<div class="row">
				<div class="col-xl-12">
					<div class="accordion js-accordion">
						<!-- Accordion Item -->
						<div class="accordion__item js-accordion-item">
							<div class="accordion-header js-accordion-header">REPLY NOW</div>
							<!-- Accordtion Body -->
							<div class="accordion-body js-accordion-body" style="display: none;">
								<!-- Accordion Content -->
								<div class="accordion-body__contents">
                                    <form>
                                    <div>
                                        <textarea class="with-border" name="message" cols="40" rows="5" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
                                    </div>
                                    <div class="uploadButton margin-top-30">
                                        <input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
                                        <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                                        <span class="uploadButton-file-name">Images or documents that might be helpful in describing your problem.</span>
                                    </div>	
                                    <div style="text-align: center;"> 			
                                    <input type="submit" class="btn btn-block margin-top-15 " id="submit" value="SUBMIT"/>
                </div>	
                                </form>
                                </div>
							</div>
							<!-- Accordion Body / End -->
						</div>
						<!-- Accordion Item / End -->
					</div>
				</div>
			</div>
			</form>
        <!-- Dashboard Content / End -->
        <br><br>

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-line-awesome-wechat"></i>Recent Conversation</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach ($data->info as $item)
									
								
								@if($item->user_type=='client')
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
											<a href="#" class="job-listing-company-logo">
												<i class="icon-feather-user" style="font-size: xx-large"></i>
											</a>

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">Client ({{auth()->user()->name}})</a></h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
									  				<li><b><i class="icon-material-outline-access-time"></i> 2 days ago</li></b>
                                                    </ul>
                                                 
                                                </div>
                                                
                                            </div>
                                          
                                         
                                        </div>
                                        
									</div>
									<!-- Buttons -->
									<div class="buttons-to-right">
										<a href="#" class="button red ripple-effect ico" title="Remove" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
                                    </div>
                                    <p>{{$item->message}}</p>
								</li>
								@endif

								@if($item->user_type=='support')
                                <li style="background-color: lightgrey;">
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
											<a href="#" class="job-listing-company-logo">
												<i class="icon-line-awesome-users" style="font-size: xx-large"></i>
											</a>

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">Support</a></h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
									  				<li><b><i class="icon-material-outline-access-time"></i> 2 days ago</li></b>
                                                    </ul>
                                                 
                                                </div>
                                                
                                            </div>
                                          
                                         
                                        </div>
                                        
									</div>
									<!-- Buttons -->
									<div class="buttons-to-right">
										<a href="#" class="button red ripple-effect ico" title="Remove" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
                                    </div>
                                    <p>{{$item->message}}</p>
								</li>
                                @endif

								@endforeach

							</ul>
						</div>
					</div>
				</div>

			

			</div>
			<!-- Row / End -->
        </div>


<br><br><br>
	</div>

</div>


    <!-- Dashboard Container -->
	@endsection
	

	@section('scripts')
<script>
	$('#myform').submit(function(e) {
	e.preventDefault();
	  var suc_func = function(msg) {
		 location.reload();
	  };
		fetch2("{{url('dashboard/reply-ticket')}}",$('form').serialize(),"POST", "JSON",suc_func, false, false, false);
		
	});
  </script>
@endsection