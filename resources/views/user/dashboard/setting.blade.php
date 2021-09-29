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
						<li>Settings</li>
					</ul>
				</nav>
			</div>
			<!-- Row -->
			<div class="row">
				<form action="{{url('dashboard/profile')}}" method="POST" id="profile"> @csrf @if(isset($profile->id))
					<input type="hidden" name="id" value="{{$profile->id}}"> @endif
					<input type="hidden" name="old_image" value="{{isset($profile->image) ? $profile->image : ''}}">
					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">
							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-account-circle"></i> My Account</h3> </div>
							<div class="content with-padding padding-bottom-0">
								<div class="row">
									<div class="col-auto">
										<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar"> <img class="profile-pic" src="{{isset($profile->image) ? asset('storage/profile_images/'.$profile->image)  : asset('assets/images/user-avatar-placeholder.png')}}" alt="" />
											<div class="upload-button"></div>
											<input class="file-upload" type="file" accept="image/*" name="myImage" /> </div>
									</div>
									<div class="col">
										<div class="row">
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>First Name</h5>
													<input type="text" class="with-border" placeholder="Enter your first name" name="first_name" value="{{isset($profile->first_name) ? $profile->first_name : ''}}" required> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Last Name</h5>
													<input type="text" class="with-border" placeholder="Enter your last name" name="last_name" value="{{isset($profile->last_name) ? $profile->last_name : ''}}" required> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Company Name</h5>
													<input type="text" class="with-border" placeholder="Enter your company name" name="company_name" value="{{isset($profile->company_name) ? $profile->company_name : ''}}"> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Address</h5>
													<input type="text" class="with-border" placeholder="Enter your Address" name="address" value="{{isset($profile->address) ? $profile->address : ''}}" required> </div>
											</div>
										
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Country</h5>
													<select class="selectpicker with-border" data-size="7" title="Select Country" data-live-search="true" name="country" required>
							
														<option value="AR" {{isset($profile->country) ? is_selected('AR', $profile->country) : '' }}>Argentina</option>
														<option value="AM" {{isset($profile->country) ? is_selected('AM', $profile->country) : '' }}>Armenia</option>
														<option value="AW" {{isset($profile->country) ? is_selected('AW', $profile->country) : '' }}>Aruba</option>
														<option value="AU" {{isset($profile->country) ? is_selected('AU', $profile->country) : '' }}>Australia</option>
														<option value="AT" {{isset($profile->country) ? is_selected('AT', $profile->country) : '' }}>Austria</option>
														<option value="AZ" {{isset($profile->country) ? is_selected('AZ', $profile->country) : '' }}>Azerbaijan</option>
														<option value="BS" {{isset($profile->country) ? is_selected('BS', $profile->country) : '' }}>Bahamas</option>
														<option value="BH" {{isset($profile->country) ? is_selected('BH', $profile->country) : '' }}>Bahrain</option>
														<option value="BD" {{isset($profile->country) ? is_selected('BD', $profile->country) : '' }}>Bangladesh</option>
														<option value="BB" {{isset($profile->country) ? is_selected('BB', $profile->country) : '' }}>Barbados</option>
														<option value="BY" {{isset($profile->country) ? is_selected('BY', $profile->country) : '' }}>Belarus</option>
														<option value="BE" {{isset($profile->country) ? is_selected('BE', $profile->country) : '' }}>Belgium</option>
														<option value="BZ" {{isset($profile->country) ? is_selected('BZ', $profile->country) : '' }}>Belize</option>
														<option value="BJ" {{isset($profile->country) ? is_selected('BJ', $profile->country) : '' }}>Benin</option>
														<option value="BM" {{isset($profile->country) ? is_selected('BM', $profile->country) : '' }}>Bermuda</option>
														<option value="BT" {{isset($profile->country) ? is_selected('BT', $profile->country) : '' }}>Bhutan</option>
														<option value="BG" {{isset($profile->country) ? is_selected('BG', $profile->country) : '' }}>Bulgaria</option>
														<option value="BF" {{isset($profile->country) ? is_selected('BF', $profile->country) : '' }}>Burkina Faso</option>
														<option value="BI" {{isset($profile->country) ? is_selected('BI', $profile->country) : '' }}>Burundi</option>
														<option value="KH" {{isset($profile->country) ? is_selected('KH', $profile->country) : '' }}>Cambodia</option>
														<option value="CM" {{isset($profile->country) ? is_selected('CM', $profile->country) : '' }}>Cameroon</option>
														<option value="CA" {{isset($profile->country) ? is_selected('CS', $profile->country) : '' }}>Canada</option>
														<option value="CV" {{isset($profile->country) ? is_selected('CV', $profile->country) : '' }}>Cape Verde</option>
														<option value="KY" {{isset($profile->country) ? is_selected('KY', $profile->country) : '' }}>Cayman Islands</option>
														<option value="CO" {{isset($profile->country) ? is_selected('CO', $profile->country) : '' }}>Colombia</option>
														<option value="KM" {{isset($profile->country) ? is_selected('KM', $profile->country) : '' }}>Comoros</option>
														<option value="CG" {{isset($profile->country) ? is_selected('CG', $profile->country) : '' }}>Congo</option>
														<option value="CK" {{isset($profile->country) ? is_selected('CK', $profile->country) : '' }}>Cook Islands</option>
														<option value="CR" {{isset($profile->country) ? is_selected('CR', $profile->country) : '' }}>Costa Rica</option>
														<option value="CI  {{isset($profile->country) ? is_selected('CI', $profile->country) : '' }}">Côte d'Ivoire</option>
														<option value="HR" {{isset($profile->country) ? is_selected('HR', $profile->country) : '' }}>Croatia</option>
														<option value="CU" {{isset($profile->country) ? is_selected('CU', $profile->country) : '' }}>Cuba</option>
														<option value="CW" {{isset($profile->country) ? is_selected('CW', $profile->country) : '' }}>Curaçao</option>
														<option value="CY" {{isset($profile->country) ? is_selected('CY', $profile->country) : '' }}>Cyprus</option>
														<option value="CZ" {{isset($profile->country) ? is_selected('CZ', $profile->country) : '' }}>Czech Republic</option>
														<option value="DK" {{isset($profile->country) ? is_selected('DK', $profile->country) : '' }}>Denmark</option>
														<option value="DJ" {{isset($profile->country) ? is_selected('DJ', $profile->country) : '' }}>Djibouti</option>
														<option value="DM" {{isset($profile->country) ? is_selected('DM', $profile->country) : '' }}>Dominica</option>
														<option value="DO" {{isset($profile->country) ? is_selected('DO', $profile->country) : '' }}>Dominican Republic</option>
														<option value="EC" {{isset($profile->country) ? is_selected('EC', $profile->country) : '' }}>Ecuador</option>
														<option value="EG" {{isset($profile->country) ? is_selected('EG', $profile->country) : '' }}>Egypt</option>
														<option value="GP" {{isset($profile->country) ? is_selected('GP', $profile->country) : '' }}>Guadeloupe</option>
														<option value="GU" {{isset($profile->country) ? is_selected('GU', $profile->country) : '' }}>Guam</option>
														<option value="GT" {{isset($profile->country) ? is_selected('GT', $profile->country) : '' }}>Guatemala</option>
														<option value="GG" {{isset($profile->country) ? is_selected('GG', $profile->country) : '' }}>Guernsey</option>
														<option value="GN" {{isset($profile->country) ? is_selected('GN', $profile->country) : '' }}>Guinea</option>
														<option value="GW" {{isset($profile->country) ? is_selected('GW', $profile->country) : '' }}>Guinea-Bissau</option>
														<option value="GY" {{isset($profile->country) ? is_selected('GY', $profile->country) : '' }}>Guyana</option>
														<option value="HT" {{isset($profile->country) ? is_selected('HT', $profile->country) : '' }}>Haiti</option>
														<option value="HN" {{isset($profile->country) ? is_selected('HN', $profile->country) : '' }}>Honduras</option>
														<option value="HK" {{isset($profile->country) ? is_selected('HK', $profile->country) : '' }}>Hong Kong</option>
														<option value="HU" {{isset($profile->country) ? is_selected('HU', $profile->country) : '' }}>Hungary</option>
														<option value="IS" {{isset($profile->country) ? is_selected('IS', $profile->country) : '' }}>Iceland</option>
														<option value="IN" {{isset($profile->country) ? is_selected('IN', $profile->country) : '' }}>India</option>
														<option value="ID" {{isset($profile->country) ? is_selected('ID', $profile->country) : '' }}>Indonesia</option>
														<option value="NO" {{isset($profile->country) ? is_selected('NO', $profile->country) : '' }}>Norway</option>
														<option value="OM" {{isset($profile->country) ? is_selected('OM', $profile->country) : '' }}>Oman</option>
														<option value="PK" {{isset($profile->country) ? is_selected('PK', $profile->country) : '' }}>Pakistan</option>
														<option value="PW" {{isset($profile->country) ? is_selected('PW', $profile->country) : '' }}>Palau</option>
														<option value="PA" {{isset($profile->country) ? is_selected('PA', $profile->country) : '' }}>Panama</option>
														<option value="PG" {{isset($profile->country) ? is_selected('PG', $profile->country) : '' }}>Papua New Guinea</option>
														<option value="PY" {{isset($profile->country) ? is_selected('PY', $profile->country) : '' }}>Paraguay</option>
														<option value="PE" {{isset($profile->country) ? is_selected('PE', $profile->country) : '' }}>Peru</option>
														<option value="PH" {{isset($profile->country) ? is_selected('PH', $profile->country) : '' }}>Philippines</option>
														<option value="PN" {{isset($profile->country) ? is_selected('PN', $profile->country) : '' }}>Pitcairn</option>
														<option value="PL" {{isset($profile->country) ? is_selected('PL', $profile->country) : '' }}>Poland</option>
														<option value="PT" {{isset($profile->country) ? is_selected('PT', $profile->country) : '' }}>Portugal</option>
														<option value="PR" {{isset($profile->country) ? is_selected('PR', $profile->country) : '' }}>Puerto Rico</option>
														<option value="QA" {{isset($profile->country) ? is_selected('QA', $profile->country) : '' }}>Qatar</option>
														<option value="RE" {{isset($profile->country) ? is_selected('RE', $profile->country) : '' }}>Réunion</option>
														<option value="RO" {{isset($profile->country) ? is_selected('RO', $profile->country) : '' }}>Romania</option>
														<option value="RU" {{isset($profile->country) ? is_selected('RU', $profile->country) : '' }}>Russian Federation</option>
														<option value="RW" {{isset($profile->country) ? is_selected('RW', $profile->country) : '' }}>Rwanda</option>
														<option value="SZ" {{isset($profile->country) ? is_selected('SW', $profile->country) : '' }}>Swaziland</option>
														<option value="SE" {{isset($profile->country) ? is_selected('SE', $profile->country) : '' }}>Sweden</option>
														<option value="CH" {{isset($profile->country) ? is_selected('CH', $profile->country) : '' }}>Switzerland</option>
														<option value="TR" {{isset($profile->country) ? is_selected('TR', $profile->country) : '' }}>Turkey</option>
														<option value="TM" {{isset($profile->country) ? is_selected('TM', $profile->country) : '' }}>Turkmenistan</option>
														<option value="TV" {{isset($profile->country) ? is_selected('TV', $profile->country) : '' }}>Tuvalu</option>
														<option value="UG" {{isset($profile->country) ? is_selected('UG', $profile->country) : '' }}>Uganda</option>
														<option value="UA" {{isset($profile->country) ? is_selected('UA', $profile->country) : '' }}>Ukraine</option>
														<option value="GB" {{isset($profile->country) ? is_selected('GB', $profile->country) : '' }}>United Kingdom</option>
														<option value="US" {{isset($profile->country) ? is_selected('US', $profile->country) : '' }}>United States</option>
														<option value="UY" {{isset($profile->country) ? is_selected('UY', $profile->country) : '' }}>Uruguay</option>
														<option value="UZ" {{isset($profile->country) ? is_selected('UZ', $profile->country) : '' }}>Uzbekistan</option>
														<option value="YE" {{isset($profile->country) ? is_selected('YE', $profile->country) : '' }}>Yemen</option>
														<option value="ZM" {{isset($profile->country) ? is_selected('ZM', $profile->country) : '' }}>Zambia</option>
														<option value="ZW" {{isset($profile->country) ? is_selected('ZW', $profile->country) : '' }}>Zimbabwe</option>
													</select>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5> Phone Number</h5>
													<input type="Number" class="with-border" placeholder="Enter your phone no" name="phone_number" value="{{isset($profile->phone_number) ? $profile->phone_number : ''}}" required> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>City</h5>
													<input type="text" class="with-border" placeholder="Enter your city name" name="city" value="{{isset($profile->city) ? $profile->city : ''}}" required> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>State</h5>
													<input type="text" class="with-border" placeholder="Enter your state name" name="state" value="{{isset($profile->state) ? $profile->state : ''}}" required> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5> Zip</h5>
													<input type="Number" class="with-border" placeholder="Enter your zip code" name="zip" value="{{isset($profile->zip) ? $profile->zip : ''}}" required> </div>
											</div>
											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Email</h5>
													<input type="text" class="with-border" placeholder="Enter your email" name="email_address" value="{{auth()->user()->email}}" required> </div>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="button big dark " style="width: 100%;text-align:center;">Save Changes</button>
							</div>
						</div>
					</div>
				</form>
			
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
$('#profile').submit(function(e) {
	e.preventDefault();
	var suc_func = function(msg) {
		Swal.fire('Great !', 'Profile saved successfully', 'success')
	};
	var error_func = function(msg) {
			Swal.fire(msg.responseJSON.title, msg.responseJSON.content, 'danger')
		}
   // fetch2("{{url('dashboard/profile')}}",$('form').serialize(),"POST", "JSON",suc_func, false, false, false);
	fetch_file_d($("#profile").attr('action'), this, "POST", suc_func, error_func, false, false, false);


});
</script>



@endsection