<header>
	@include('layouts.partials_ad.sidebar')
	<style>
		.black-skin .navbar.double-nav a{
			color: #222;
		}
	</style>
	<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar mx-3 mt-1" style="box-shadow: none; background: black; color: #222; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.291); border-radius: 16px; height: 50px;">
		
		<!-- Breadcrumb -->
		<div class="breadcrumb-dn mr-auto">
			<div class=" p-3 mx-4" style="border-radius: 16px; box-shadow: none; color: white;">
				Admin
			</div>
		</div>

		<div class="d-flex change-mode" >
			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				<li class="nav-item dropdown notifications-nav d-none">
					<a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="badge red">3</span> <i class="fas fa-bell"></i>
						<span class="d-none d-md-inline-block">Notificaciones</span>
					</a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">
							<i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
							<span>New order received</span>
							<span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
						</a>
						<a class="dropdown-item" href="#">
							<i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
							<span>New order received</span>
							<span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
						</a>
						<a class="dropdown-item" href="#">
							<i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
							<span>Your campaign is about to end</span>
							<span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
						</a>
					</div>
				</li>
				<div class=" p-2 mx-4" style="border-radius: 16px; box-shadow: none;">
				<li class="nav-item dropdown" style="color: white;">
					<a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i style="color: white;" class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block" style="color: white;">Perfil</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style="color: white;">
						<a class="dropdown-item" href="#">Mi cuenta</a>
						<a class="dropdown-item" href="{{ route('admin.logout') }}"
							 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Salir') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>
					</div>
				</li>
			</div>
			</ul>
		</div>
	</nav>

</header>
