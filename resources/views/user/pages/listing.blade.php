@extends('user.layout.master') @section('content')
<!-- Spacer -->
<div class="margin-top-90"></div>
<!-- Spacer / End-->
<!-- Page Content
================================================== -->
<div class="container" >
	<div class="row">
		<div class="col-xl-3 col-lg-4">
			<div class="sidebar-container">
				<form action="{{url('/listing')}}" method="get" id="myform">
					<!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
					<!-- Monetization -->
					<div class="sidebar-widget">
						<h3>Monetization</h3>
							<select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Monetizations" name="monetization[]">
							@foreach (get_monetizations() as $item)
							<option value="{{$item->id}}" @if($request->monetization && is_array($request->monetization)){{in_array($item->id, $request->monetization)?"selected":""}}@endif>{{$item->name}}</option> 
							@endforeach 
						</select>
					</div>
					<!--Industry -->
					<div class="sidebar-widget">
						<h3>Industry</h3>
							<select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Industries" name="industry[]">

							@foreach (get_Industry() as $item)
							<option value="{{$item->id}}" @if($request->industry && is_array($request->industry)){{in_array($item->id, $request->industry)?"selected":""}}@endif>{{$item->name}}</option> @endforeach </select>
					</div>
					<!-- Keywords -->
					<div class="sidebar-widget">
						<h3>Keywords</h3>
						<div class="keywords-container">
							<div class="keyword-input-container">
								<input type="text" class="keyword-input" name="keyword" placeholder="e.g. title, number" value="{{$request->keyword}}" maxlength="10" />
								<!-- <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button> -->
							</div>
							<div class="keywords-list">
								<!-- keywords go here -->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- Budget -->
					@if($min_money != $max_money)
					<div class="sidebar-widget">
						<h3>Price</h3>
						<div class="margin-top-55"></div>
						<!-- Range Slider -->
						<input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="{{$max_money}}" data-slider-step="25" data-slider-value="[{{$min_money}},{{$max_money}}]" name="price" /> </div>
						@endif
					<input type="submit" class="btn btn-lg btn-block" id="submit" value="Search" />
					<!-- Hourly Rate -->
					<!-- div class="sidebar-widget">
					<h3>Hourly Rate</h3>
					<div class="margin-top-55"></div -->
					<!-- Range Slider -->
					<!-- <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="150" data-slider-step="5" data-slider-value="[10,200]"/> -->
					<!-- 	</div> -->
					<!-- Tags -->
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
		
		<!-- Listing -->
		<div class="col-xl-9 col-lg-8 content-left-offset" id="my_content">
			@include('user.partials.listing')
			
		</div>
		<!-- Listing / End -->
	</div>
</div> @endsection 
@section('scripts')
<script>
	$(document).ready(function(){
		// $(".selectpicker2").selectpicker();
	});
// $('#myform').submit(function(e) {
// 	e.preventDefault();
// 	var suc_func = function(data) {
// 		$("#my_content").html(data);
// 		$(".selectpicker").selectpicker('refresh');
// 	};
// 	fetch2("{{url('/search-listing')}}", $('form').serialize(), "POST", "HTML", suc_func, false, false, false);
// });
</script> 
@endsection