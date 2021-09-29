<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">
				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger"> <span class="hamburger hamburger--collapse">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span> </span>
					</span> <span class="trigger-title">Dashboard Navigation</span> </a>
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">
						<ul data-submenu-title="GENERAL">
							<li><a href="{{url('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="#"><i class="icon-feather-user-plus"></i>Support Ticket</a>
								<ul>
									<li><a href="{{url('dashboard/all-support-tickets')}}">My Tickets<span class="nav-tag">{{get_ticket_count()}}</span></a></li>
									<li><a href="{{url('/dashboard/add-ticket')}}">Add New Ticket</a></li>
								</ul>
							</li>
							<li><a href="{{url('dashboard/bookmark')}}"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>
						</ul>
						<ul data-submenu-title="FOR SELLERS">
							<li><a href="#"><i class="icon-material-outline-business-center"></i> Listings</a>
								<ul>
									<li><a href="{{url('dashboard/seller-listing')}}">Show My Listings <span class="nav-tag">{{myListingCount()}}</span></a></li>
									<li><a href="{{url('/add-business')}}">Add New Listing</a></li>
								</ul>
							</li>
							<li><a href="#"><i class="icon-material-outline-assignment"></i> Offers Received</a>
								<ul>
									<li><a href="{{url('dashboard/seller-offers')}}">View All Received Offers </a></li>
								</ul>
							</li>
						</ul>
						<ul data-submenu-title="FOR BUYERS">
							{{-- <li><a href="#"><i class="icon-material-outline-business-center"></i> Listings</a>
								<ul>
									<li><a href="#">Favourite Listing<span class="nav-tag">3</span></a></li>
								</ul>
							</li> --}}
							<li><a href="#"><i class="icon-material-outline-assignment"></i>Sent Offers</a>
								<ul>
									<li><a href="{{url('dashboard/buyer-offers')}}">View All Sent Offers <span class="nav-tag">{{myOffersCount()}}</span></a></li>
								</ul>
							</li>
						</ul>
						<ul data-submenu-title="ACCOUNT">
							<li><a href="{{url('dashboard/unlock-limit')}}"><i class="icon-line-awesome-unlock"></i> Unlock LIMIT</a></li>
							<li><a href="{{url('dashboard/password')}}"><i class="icon-line-awesome-lock"></i> Update Password</a></li>
							<li><a href="{{url('dashboard/setting')}}"><i class="icon-material-outline-settings"></i> Profile</a></li>
							<li><a href="{{url('/logout')}}"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
					</div>
				</div>
				<!-- Navigation / End -->
			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->