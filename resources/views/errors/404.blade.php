@extends('user.layout.master')
@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>404 Not Found</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>404 Not Found</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

<!-- Page Content
================================================== -->
<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-xl-12">

			<section id="not-found" class="center margin-top-50 margin-bottom-25">
				<h2>404 <i class="icon-line-awesome-question-circle"></i></h2>
				<p>We're sorry, but the page you were looking for doesn't exist</p>
			</section>

			<div class="row">
				<div class="col-xl-8 offset-xl-2">
						
							<!-- Button -->
							<div class="intro-search-button">
                            <a href="{{url('/support')}}">
								<button class="button ripple-effect">Contact Our Support</button>
                                </a>
                            </div>
						
				</div>
			</div>

		</div>
	</div>

</div>
<!-- Container / End -->


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->


@endsection