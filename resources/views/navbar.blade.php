<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('home') }}">billventory</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ url('sales') }}">Listados de ventas</a></li>
				<li><a href="{{  url('products') }}">Productos</a></li>
				<li><a href="{{  url('providers') }}">Proveedores</a></li>
				<li><a href="{{  url('customers') }}">Clientes</a></li>
				<li><a href="{{  url('users') }}">Empleados</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#">{{ Auth::user()->name }}</a></li>
			<li><a href="{{  route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Salir</a></li>
			<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>