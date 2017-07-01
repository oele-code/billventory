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
			<a class="navbar-brand" href="{{ url('home') }}">Stock</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ url('sales') }}">Ventas</a></li>
				<li><a href="{{  url('products') }}">Productos</a></li>
				<li><a href="{{  url('providers') }}">Proveedores</a></li>
				<li><a href="{{  url('customers') }}">Clientes</a></li>
				<li><a href="{{  url('users') }}">Empleados</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#">{{ Auth::user()->name }}</a></li>
			<li><a href="{{  url ('auth/logout') }}">Salir</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>