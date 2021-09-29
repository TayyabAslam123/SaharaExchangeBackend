@extends('admin-panel.layout.master') 
@section('content')
<div class="row">


    <!----FILTER TICKETS--->
	<div class="col-sm-3">
		<!-- left sidebar -->
		<div class="nav-left-sidebar sidebar-light" style="margin-left: -25px;">
			<div class="menu-list">
				<nav class="navbar navbar-expand-lg navbar-light"> <a class="d-xl-none d-lg-none" href="{{url('/admin')}}">Dashboard</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav flex-column">
							<li class="nav-divider">
								<h3><b>FILTER DOCUMENTS</b></h3> </li> {{--
							<li class="nav-item "> <a class="nav-link" href="{{url('/admin')}}"><b><i class="fas fa-desktop"></i>Dashboard</b> <span class="badge badge-success">6</span></a> </li> --}}
							<form action="{{url('admin/filter-ticket')}}" method="GET">
								<div class="form-group">
									<select class="form-control" name="is_checked">
										
										<option value="0">Unchecked</option>
										<option value="1">Checked</option>
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
    
    <!----ALL TICKETS----->
	<div class="col-sm-9">
		<h1 class="display-4">User Documents</h1>
		<div style="margin-left: 0px;">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered second" style="width:100%">
							<thead>
								<tr>
									<th>Last Updated</th>
									<th>User</th>
									<th>is checked</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user_documents as $document)
								<tr>
									<td>{{$document->created_at}}</td>
									<td><a href="{{url('admin/users/'.$document->user_id.'/edit')}}">{{$document->user->name}}<br>{{$document->user->email}}</a></td>
									<td>{{($document->is_checked)?"CHECKED":"NEW"}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- end data table  -->
	</div>
</div> @endsection