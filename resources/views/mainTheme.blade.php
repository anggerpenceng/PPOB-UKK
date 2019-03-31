
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
	<!-- endinject -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<!-- endinject -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    @yield('css')
</head>
<body>
<div class="container-scroller">
	<!-- partial:partials/_navbar.html -->
	<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
			<a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"/></a>
			<a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo"/></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-stretch">
			<div class="search-field d-none d-md-block">
				<form class="d-flex align-items-center h-100" action="#">
					<div class="input-group">
						<div class="input-group-prepend bg-transparent">
							<i class="input-group-text border-0 mdi mdi-magnify"></i>
						</div>
						<input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
					</div>
				</form>
			</div>
			<ul class="navbar-nav navbar-nav-right">
				<li class="nav-item nav-profile dropdown">
					<a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
						<div class="nav-profile-img">
							<img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
							<span class="availability-status online"></span>
						</div>
						<div class="nav-profile-text">
							<p class="mb-1 text-black">{{ Auth::user()->name }}</p>
						</div>
					</a>
					<div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('logout') }}">
							<i class="mdi mdi-logout mr-2 text-primary"></i>
							Signout
						</a>
					</div>
				</li>
				<li class="nav-item d-none d-lg-block full-screen-link">
					<a class="nav-link">
						<i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
						<i class="mdi mdi-email-outline"></i>
						<span class="count-symbol bg-warning"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
						<h6 class="p-3 mb-0">Messages</h6>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<img src="{{ asset('assets/images/faces/face4.jpg') }}" alt="image" class="profile-pic">
							</div>
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
								<p class="text-gray mb-0">
									1 Minutes ago
								</p>
							</div>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<img src="{{ asset('assets/images/faces/face2.jpg') }}" alt="image" class="profile-pic">
							</div>
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
								<p class="text-gray mb-0">
									15 Minutes ago
								</p>
							</div>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<img src="{{ asset('assets/images/faces/face3.jpg') }}" alt="image" class="profile-pic">
							</div>
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
								<p class="text-gray mb-0">
									18 Minutes ago
								</p>
							</div>
						</a>
						<div class="dropdown-divider"></div>
						<h6 class="p-3 mb-0 text-center">4 new messages</h6>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
						<i class="mdi mdi-bell-outline"></i>
						<span class="count-symbol bg-danger"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
						<h6 class="p-3 mb-0">Notifications</h6>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<div class="preview-icon bg-success">
									<i class="mdi mdi-calendar"></i>
								</div>
							</div>
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
								<p class="text-gray ellipsis mb-0">
									Just a reminder that you have an event today
								</p>
							</div>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<div class="preview-icon bg-warning">
									<i class="mdi mdi-settings"></i>
								</div>
							</div>
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
								<p class="text-gray ellipsis mb-0">
									Update dashboard
								</p>
							</div>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<div class="preview-icon bg-info">
									<i class="mdi mdi-link-variant"></i>
								</div>
							</div>
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
								<p class="text-gray ellipsis mb-0">
									New admin wow!
								</p>
							</div>
						</a>
						<div class="dropdown-divider"></div>
						<h6 class="p-3 mb-0 text-center">See all notifications</h6>
					</div>
				</li>
				<li class="nav-item nav-logout d-none d-lg-block">
					<a class="nav-link" href="{{ route('logout') }}" onclick="return confirm('Are you sure to logout?')">
						<i class="mdi mdi-power"></i>
					</a>
				</li>
				<li class="nav-item nav-settings d-none d-lg-block">
					<a class="nav-link" href="#">
						<i class="mdi mdi-format-line-spacing"></i>
					</a>
				</li>
			</ul>
			<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
				<span class="mdi mdi-menu"></span>
			</button>
		</div>
	</nav>
	<!-- partial -->
	<div class="container-fluid page-body-wrapper">
		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<ul class="nav">
				<li class="nav-item nav-profile">
					<a href="#" class="nav-link">
						<div class="nav-profile-image">
							<img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
							<span class="login-status online"></span> <!--change to offline or busy as needed-->
						</div>
						<div class="nav-profile-text d-flex flex-column">
							<span class="font-weight-bold mb-2">David Grey. H</span>
							<span class="text-secondary text-small">Project Manager</span>
						</div>
						<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
					</a>
				</li>
				<li class="nav-item @if($data['selection'] == 0) active @endif">
					<a class="nav-link" href="/">
						<span class="menu-title active">Dashboard</span>
						<i class="mdi mdi-home menu-icon"></i>
					</a>
				</li>
				@if(Auth::user()->roles->nama_role == 'admin')
					<li class="nav-item @if($data['selection'] == 1) active @endif ">
						<a class="nav-link" href="/users">
							<span class="menu-title">Users Data</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="nav-item @if($data['selection'] == 2) active @endif ">
						<a class="nav-link" href="/roles">
							<span class="menu-title">Users Roles</span>
							<i class="mdi mdi-fingerprint menu-icon"></i>
						</a>
					</li>
					<li class="nav-item @if($data['selection'] == 3) active @endif ">
						<a class="nav-link" href="/tarif">
							<span class="menu-title">Tarif</span>
							<i class="mdi mdi-cash-usd menu-icon"></i>
						</a>
					</li>
					<li class="nav-item @if($data['selection'] == 4) active @endif ">
						<a class="nav-link" href="/penggunaan">
							<span class="menu-title">Penggunaan User</span>
							<i class="mdi mdi-cash-multiple menu-icon"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
							<span class="menu-title">Other Data</span>
							<i class="menu-arrow"></i>
							<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						</a>
						<div class="collapse" id="ui-basic">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
								<li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
							</ul>
						</div>
					</li>
				@elseif(Auth::user()->roles->nama_role == 'pelanggan')
					<li class="nav-item @if($data['selection'] == 1) active @endif ">
						<a class="nav-link" href="/user-site/tagihan">
							<span class="menu-title">Daftar Tagihan</span>
							<i class="mdi mdi-view-list menu-icon"></i>
						</a>
					</li>
				@endif
				<li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
            </span>
				</li>
			</ul>
		</nav>
		<!-- partial -->
		<div class="main-panel">
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- content-wrapper ends -->
			<!-- partial:partials/_footer.html -->
			<footer class="footer">
				<div class="d-sm-flex justify-content-center justify-content-sm-between">
					<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
					<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
				</div>
			</footer>
			<!-- partial -->
		</div>
		<!-- main-panel ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/jquery.js') }}"></script>
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
@yield('script')
</body>

</html>
