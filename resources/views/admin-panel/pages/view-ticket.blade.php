@extends('admin-panel.layout.master') @section('content')
<div class="row">
	<div class="col-sm-3">
		<!-- left sidebar -->
		<div class="nav-left-sidebar sidebar-light" style="margin-left: -25px;">
			<div class="menu-list">
				<nav class="navbar navbar-expand-lg navbar-light"> <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav flex-column">
							<li class="nav-divider">
								<h3><b>FILTER TICKETS</b></h3> </li> {{--
							<li class="nav-item "> <a class="nav-link" href="{{url('/admin')}}"><b><i class="fas fa-desktop"></i>Dashboard</b> <span class="badge badge-success">6</span></a> </li> --}}
							<form action="{{url('admin/filter-ticket')}}" method="GET">
								<div class="form-group">
									<select class="form-control" name="status">
										
										<option value="active">Active</option>
										<option value="closed">Closed</option>
									</select>
								</div>
								<div class="form-group">
									<input class='form-control' type="text" placeholder="Subject" name="subject"> </div>
								<div class="form-group">
									<input class='form-control' type="text" placeholder="Client Name" name="name"> </div>
								<div class="form-group">
									<input class='form-control' type="email" placeholder="Client Email Address" name="email"> </div>
									 <button type="submit" class="btn btn-primary btn-block">Filter</button> 
							</form>
							<br>
							<br>
							<br>
							<br> </ul>
					</div>
				</nav>
			</div>
		</div>
		<!-- end left sidebar -->
  </div>
  

	<div class="col-sm-9">
		<h1><b>#{{$data->id}}__{{$data->subject}}</b></h1>
		<div class="accrodion-regular" style="background: lightyellow;">
			<div id="accordion4" style="background: lightyellow;">
				<div class="card bg" style="background: lightyellow;">
					<div class="card-header" id="headingTen">
						<h5 class="mb-0">
                   <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                     <h2 style="color:black;"><b>REPLY</b></h2>
                   </button>
                  </h5> </div>
					<div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-parent="#accordion4">
						<div class="card-body">

          <form action="{{url('admin/reply-ticket')}}" method="post" id="myform">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          <input type="hidden" value="{{$data->id}}" name="ticket_id">
							<!--message-->
							<div class="form-group">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="message"></textarea>
              </div>
              <input type="submit" class="btn btn-primary " id="submit" value="SUBMIT"/>   
          </form>
              
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--add reply end-->
		<br>
    <br>
    @foreach ($data->info as $item)
        

  @if($item->user_type=="client")
		<!--CLIENT MSG-->
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header" style="font-size: large;"> <i class="fas fa-user"></i> <b>Client</b> </div>
				<div class="card-body">{{$item->message}}</div>
			</div>
		</div>
    <!--CLIENT END-->
   @endif

   @if($item->user_type=="support")
		<!--SUPPORT MSG-->
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header" style="background: lightyellow;font-size: large;"> <i class="fas fa-users"></i> <b>Support</b> </div>
				<div class="card-body" style="background: lightyellow;">{{$item->message}}</div>
			</div>
		</div>
    <!--SUPPORT END-->
    @endif

    @endforeach
	</div>
</div> @endsection