<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ url('/admin') }}">
				<img class="header-logo" src="{{ asset('backend/img/logo.png')}}" alt="image" />
				<span
                class="logo-name"> Otika </span>
			</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Main</li>
			<li class="dropdown active">
				<a href="{{ url('/admin') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
			</li>
			<li class="dropdown">
				<a href="{{ url('/admin/menu-builder') }}" class="nav-link"><i data-feather="menu"></i><span>Menu Builder</span></a>
			</li>
		</ul>
	</aside>
</div>