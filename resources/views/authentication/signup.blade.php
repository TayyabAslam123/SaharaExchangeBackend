

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
					<h2>Let's create your account!</h2>
					<span>Already have an account? <a href="{{url('/login')}}">Log In!</a></span>
				</div>

						
				<!-- Form -->
				<form method="POST" action="{{ route('register') }}" id="login-form">
					@csrf
        
                    <!--username-->
                    <div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border"  id="username-register" placeholder="Your Full Name" @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					</div>
                    @error('name')
                    <span class="invalid-feedback" role="alert" style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--email-->
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" placeholder="Email Address" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
					</div>

                    @error('email')
                    <span class="invalid-feedback" role="alert" style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--password-->
					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" minlength="8" maxlength="20" class="input-text with-border"  class="form-control" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
					</div>
                    @error('password')
                    <span class="invalid-feedback" role="alert" style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
 
                    <!--confirm password-->
					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" minlength="8" maxlength="20" class="input-text with-border" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
					</div>
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i><a href="{{url('/redirect_fb')}}">Register via Facebook</a></button>
					<button  class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i><a href="{{url('/redirect_google')}}">Regster via Google+</a>
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