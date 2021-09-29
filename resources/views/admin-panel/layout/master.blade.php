@include('admin-panel.includes.loader')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin-panel/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
<!--dt-->
<link href="{{asset('admin-panel/assets/vendor/dt/dt.css')}}" rel="stylesheet">
<!--dt-->    
 <!--summer-note-->
<link rel="stylesheet" href="{{URL::to('admin-panel/assets/vendor/summer-note/summernote.css')}}">
 <!--end-->
 
 
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('admin-panel/assets/images/icon.png')}}" type="image" sizes="20x20">

    @yield('style')
  
  </head>
  <body>
    <!-- main wrapper -->
  <div class="dashboard-main-wrapper">
  <!-- navbar -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
          <a class="navbar-brand" href="{{url('/')}}" style="color:#86571D">
          <img src="{{asset('admin-panel/assets/images/icon.png')}}" style="background-color: white;" width="40%" height="30%">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
              <li class="nav-item dropdown notification">
                <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                  <li>
                
                  </li>
                  <li>
                    <div class="list-footer"> <a href="#">no notifications</a></div>
                  </li>
                </ul>
              </li>
  
              <li class="nav-item dropdown nav-user">
                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin-panel/assets/images/admin-icon.png')}}" alt="" class="user-avatar-md rounded-circle"></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                  <div class="nav-user-info">
                    <h5 class="mb-0 text-white nav-user-name">ADMIN </h5>
                  </div>
                  <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                  <a class="dropdown-item" href="{{url('logout')}}" style="color: red;"><i class="fas fa-power-off mr-2"></i>Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
     
      <!-- end navbar -->
      <!-- ============================================================== -->   
      <!-- left sidebar -->

      <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                <li class="nav-divider" >
                  MAIN COMPONENTS
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{url('/admin')}}"><b><i class="fas fa-desktop"></i>Dashboard</b> <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/users')}}"><i class="fa fa-fw fa-user-circle"></i>Users <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{url('admin/listing')}}" ><i class="fas fa-list-ul"></i>Listings <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/offers')}}" ><i class=" far fa-handshake"></i>Offers<span class="badge badge-success">6</span></a>
                  </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/industry')}}"><i class="fas fa-industry"></i>Industry <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{url('admin/monetization')}}"><i class="far fa-money-bill-alt"></i>Monetizations <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/status')}}"><i class=" fab fa-font-awesome-flag"></i>Statuses</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/user_documents')}}"><i class="fas fa-folder"></i>Documents ({{unread_documents()}})</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/package')}}" ><i class="fas fa-window-maximize"></i>Packages </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/social-platforms')}}" ><i class=" fas fa-users"></i>Social Platforms <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/payment-gateway')}}" ><i class="fas fa-dollar-sign"></i>Payment Gateways <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-divider">
                  Support system
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/all-tickets')}}"><i class=" far fa-comment-alt"></i>Support Tickets   <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fab fa-rocketchat"></i>Chats <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{url('admin/subscribers')}}"><i class="fas fa-envelope"></i>Subscribers <span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-divider">
                CMS
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{url('admin/social-links')}}" ><i class="fab fa-facebook"></i>Social links<span class="badge badge-success">6</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('admin/blog')}}"><i class="far fa-window-restore"></i>Blog<span class="badge badge-success">6</span></a>
                </li>
                
                <li class="nav-item ">
                <a class="nav-link" href="{{url('/admin/faqs')}}" ><i class=" fas fa-question"></i>Manage Faq's<span class="badge badge-success">6</span></a>
                </li>
              
                <br><br><br><br>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- end left sidebar -->

      <!-- ============================================================== -->
      <!-- wrapper  -->
     <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
          <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- MAIN CONTENT  -->
            @yield('content')

            
            @if(auth()->check())
            @include('chat')
            @endif
            <!-- ============================================================== -->
          </div>
        </div>
      </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{asset('admin-panel/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('admin-panel/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{asset('admin-panel/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('admin-panel/assets/libs/js/main-js.js')}}"></script>
   

<!--summer-note-->
    <script src="{{asset('admin-panel/assets/vendor/summer-note/summernote.min.js')}}"></script>
<!--end-->

<!--data-table-->
    <script src="{{asset('admin-panel/assets/vendor/dt/datatable/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/vendor/dt/js/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/vendor/dt/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
   <script>
        $(document).ready( function () {
        $('#dt').DataTable( {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
          
            { extend: 'copy', className: 'btn btn-dark ' },
            { extend: 'excel', className: 'btn btn-dark ' },
            { extend: 'print', className: 'btn btn-dark ' }
        ]} );});
   </script>
<!--datatable-->   


  <script>
  $(document).ready(function() {
        $('#summernote').summernote({
            height: 300

        });
    });
</script>

@yield('scripts')
  </body>
</html>