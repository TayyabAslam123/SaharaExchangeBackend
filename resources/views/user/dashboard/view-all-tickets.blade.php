@extends('user.layout.master')

@section('head')
    <link rel="stylesheet" href="{{asset('user/css/invoice.css')}}">
@endsection
@section('content')

<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Dashboard Container -->
<div class="dashboard-container">
@include('user.includes.dashboard-sidebar')
	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
				<!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>My Support Tickets</h3>
    
                </div>
		
	
			<!-- Row -->
			<div class="row">

             

		
			</div>
			<!-- Row / End -->
            <div class="input-with-icon-left">
                <input id="myInput" class="with-border"  name="subject" type="text" placeholder="Search"/>
                <i class="icon-material-outline-search"></i>
            </div>
            	<!-- Invoice -->
	<div class="row">
		<div class="col-xl-12">
			<table class="margin-top-20">
                <thead>
				<tr>
					<th>Department</th>
					<th>Subject</th>
					<th>Status</th>
					<th>Last Updated</th>
                </tr>
                </thead>
                <tbody id="myTable">

				@foreach ($tickets as $item)
				<tr>
					<td>Support</td> 
					<td><a href="{{url('dashboard/support-ticket/'.$item->id)}}">#{{$item->id}}<br>{{$item->subject}}</a></td>
					<td>Available</td>
					<td>{{date_frmt($item->created_at)}}</td>
                </tr>
				@endforeach
				
                </tbody>
			</table>
		</div>
		
	
	</div>
		

		</div>
	</div>
    <!-- Dashboard Content / End -->   

</div>
<!-- Dashboard Container -->
@endsection

@section('scripts')
<!---SEARCH-->
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        }
                               );
      }
                      );
    }
                     );
  </script>
  @endsection