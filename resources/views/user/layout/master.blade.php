<!doctype html>
<html lang="en">
<head>
<title>Sahara Exchange</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS -->
{{-- <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">  --}}
<link rel="stylesheet" href="{{asset('user/css/style.css')}}">

<link rel="stylesheet" href="{{asset('user/css/jquery.steps.css')}}">
<link rel="stylesheet" href="{{asset('user/css/colors/blue.css')}}">
<link rel="icon" href="{{asset('admin-panel/assets/images/icon.png')}}" type="image" sizes="18x18">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@yield('head')
<style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>

</head>
<body>

<!-- Wrapper -->
@if(Request::path()=="/")
<div id="wrapper" class="wrapper-with-transparent-header">
@else
<div id="wrapper">

@endif

<!--header-->
@include('user.includes.header')
<!--end header-->

<div class="clearfix"></div>

@include('loader')
<!--MAIN CONTENT-->
@yield('content')
<!--END MAIN CONTENT-->
@if(auth()->check())
  @include('chat')
@endif

<!--footer -->
@if(!(request()->is('dashboard*')))
@include('user.includes.footer')
@endif
<!--end footer-->


</div>
<!-- Wrapper / End -->

<!-- Scripts -->
<script src="{{asset('user/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('user/js/jquery-migrate-3.3.1.min.js')}}"></script>
<script src="{{asset('user/js/mmenu.min.js')}}"></script>
<script src="{{asset('user/js/tippy.all.min.js')}}"></script>
<script src="{{asset('user/js/simplebar.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('user/js/snackbar.js')}}"></script>
<script src="{{asset('user/js/clipboard.min.js')}}"></script>
<script src="{{asset('user/js/counterup.min.js')}}"></script>
<script src="{{asset('user/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('user/js/slick.min.js')}}"></script>
<script src="{{asset('user/js/custom.js')}}"></script>
<script src="{{asset('user/js/application.js')}}"></script>
<script src="{{asset('user/js/notify.js')}}"></script>
<script src="{{asset('user/js/jquery.steps.min.js')}}"></script>
{{-- <script src="{{asset('user/js/wizard.js')}}"></script> --}}
@yield('scripts')

<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>
<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };
		 var input = document.getElementById('autocomplete-input');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}
	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){ 
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}
</script>
<!-- Google API -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script> -->
@include('user.partials.generic_popup')
<a id="generic_popup_opener" style="display: none" href="#small-dialog-2" class="popup-with-zoom-anim button ripple-effect margin-top-5 margin-bottom-10"></a>
<!---SUBSCRIBTION-->
<script>
	$('#subscribe').submit(function(e) {
	  e.preventDefault();


	  var suc_func = function(msg) {
		// $.notify("Subscribed Successfully", "success");
		Swal.fire(
        'Good job!',
        'You have subscribed successfully',
        'success' 
       )
    };
	  fetch2("{{url('/subscriber')}}",$('form').serialize(),"POST", "JSON",suc_func, false, false, false);


	});

  function unlock_listing(listing_id)
  {
    @if (auth()->check())
    var suc_func = function(data)
    {
        $("#generic_popup_opener").click();
        $("#popup_heading").html("Unlock Listing");
        $("#popup_content").html(data);
    };
    fetch2("{{url('dashboard/unlock_listing')}}",{"id":listing_id},"GET", "HTML",suc_func, false, false, true);
    @else
    return window.location = "{{url('login')}}";
    @endif

      
  }
  </script>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5466f883c34b3ea1e60f', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>

  
 <!--END--> 


</body>
</html>