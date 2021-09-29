@extends('user.layout.master')

@section('content')

<div class="clearfix"></div>
<!-- Header Container / End -->

<br><br>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">


			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h2>We're glad to see you again!</h2>
					<span>Don't have an account? <a href="{{url('signup')}}">Sign Up!</a></span>
				</div>
					<br>
				<!-- Form -->
				<form method="POST" action="{{ route('login') }}" id="login-form">
					@csrf
					@error('email')
					<span class="invalid-feedback" role="alert" style="color:red;">
						<strong>{{ $message }}</strong>
					</span>
			    	@enderror
				{{-- <form method="post" id="login-form"> --}}
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						{{-- <input type="text" class="input-text with-border" name="emailaddress" id="emailaddress" placeholder="Email Address" required/> --}}
						<input id="email" class="input-text with-border" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email Address"  autofocus>
					</div>
				

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input id="password"  class="input-text with-border" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
						{{-- <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
				 --}}
					</div>
					@error('password')
					<span class="invalid-feedback" role="alert" style="color: red;">
						<strong>{{ $message }}</strong>
					</span>
			     	@enderror
					<a href="#" class="forgot-password">Forgot Password ?</a>
			
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
			</form>	
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i><a href="{{url('/redirect_fb')}}">Log In via Facebook</a></button>
					
					<button  class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i><a href="{{url('/redirect_google')}}">Log In via Google+</a>
					</button>
					
				
					</div>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->


</body>
</html>


@endsection


@section('scripts')
    <!--IN CASE GOOGLE OR FACEBOOK LOGIN IS NOT REGISTERED ## ERROR WILL BE GENERATED ##-->
    @if( request()->get('error') )
	<script>
		$(document).ready(function(){
		 
			Swal.fire('Error !','{{request()->get('error')}}','error' );
		});
    </script>
    @endif 
    <!---->
@endsection	
