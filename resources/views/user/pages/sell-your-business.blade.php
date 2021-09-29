@extends('user.layout.master')
@section('content')
<!-- Titlebar-->
<br>
<div id="titlebar" class="gradient">
	<div class="container ">
		<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: center;">Sell Your Online Business</h2> <span style="text-align: center;">We take the friction out of buying and selling online businesses.</span> </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">

        <div class="col-xl-6 col-md-6">
            <!-- Icon Box -->
            <div class="icon-box">
                <!-- Icon -->
                <div class="icon-box-circle">
                    <div class="icon-box-circle-inner">
                        <i class="icon-line-awesome-calculator"></i>
                        <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                    </div>
                </div>
                <h2>Valuation Tool</h2>
                <p>Get a estimate that how much your online business worth.</p>
                <br>
                <a href="{{url('business-valuation-tool')}}" class="button ripple-effect" >Try Now<i class="icon-material-outline-arrow-right-alt"></i></a>
            </div>
            
        </div>
   <div class="col-xl-6 col-md-6">
            <!-- Icon Box -->
            <div class="icon-box">
                <!-- Icon -->
                <div class="icon-box-circle">
                    <div class="icon-box-circle-inner">
                        <i class="icon-material-outline-business-center"></i>
                        <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                    </div>
                </div>
                <h2>List Your Online Business</h2>
                <p>List your online business & reach thousands of hungry buyers.</p>
                <br>
                <a href="{{url('add-business')}}" class="button ripple-effect" >Get Started <i class="icon-material-outline-arrow-right-alt"></i></a>
            
            </div>
        </div>
	</div>
</div>
<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->
@endsection