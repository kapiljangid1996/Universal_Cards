<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ url('/admin') }}">
				<span class="header-logo"> UV </span>
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
			<li class="dropdown">
				<a href="{{ url('/admin/sliders') }}" class="nav-link"><i data-feather="camera"></i><span>Slider</span></a>
			</li>
			<li class="dropdown">
				<a href="{{ url('/admin/category') }}" class="nav-link"><i data-feather="layers"></i><span>Category Manager</span></a>
			</li>
			<li class="dropdown">
				<a href="{{ url('/admin/cards') }}" class="nav-link"><i class="far fa-envelope-open"></i><span>Cards</span></a>
			</li>
		</ul>
	</aside>
</div>