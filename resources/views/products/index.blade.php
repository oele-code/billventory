@extends('app')
@section('title')
	Productos
@endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#tab_1" aria-controls="home" role="tab" data-toggle="tab">Productos</a>
					</li>
					<li role="presentation">
						<a href="#tab_2" aria-controls="tab" role="tab" data-toggle="tab">Categorías</a>
					</li>

					<div class="btn-group">
						<button type="button" class="btn btn-link" data-toggle="modal" data-target="#new-modal">
		  					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo producto
						</button>
						<button type="button" class="btn btn-link" data-toggle="modal" data-target="#new-modal-category">
		  					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva categoría
						</button>
					</div>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab_1">
						<br>
						<div class="table-responsive">
							<table id="products-table" class="table table-hover table-collapse datatable">
								<thead>
									<tr>
										<th>Id</th>
										<th>Referencia</th>
										<th>Nombre</th>
										<th>Stock</th>
										<th>Precio</th>
										<th>Costo</th>
										<th>Categoria</th>
										<th>Proveedor</th>
										<th>Por</th>
										<th>Creado</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
										<tr>
											<td>{{ $product->id }}</td>
											<td>{{ $product->reference }}</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->stock }}</td>
											<td>{{ $product->price }}</td>
											<td>{{ $product->cost }}</td>
											<td>{{ $product->category->name }}</td>
											<td>{{ $product->provider->fname }}</td>
											<td>{{ $product->user->email }}</td>
											<td>{{ $product->created_at->format('d/m/Y') }}</td>
											<td>
												<div class="btn-group btn-group-sm">
													<a role="button" href="{{ url( 'products/'.$product->id.'/edit') }}" class="btn btn-primary">
														<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
													</a>
													@if( $product->stock == 0 )
							                    	<button role="button" type="submit" class="btn btn-danger" form="form-delete-{{ $product->id }}">
							                    		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
							                    	</button>
							                    	@endif
												</div>
													@if( $product->stock == 0 )
														{!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy',$product->id], 'id' => 'form-delete-'.$product->id ]) !!} 
			                							{!! Form::close(); !!} 
			                						@endif
												
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab_2">
						<br>
						<div class="table-responsive">
							<table class="table table-hover datatable">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nombre</th>
										<th>Products</th>
										<th>Creado</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<td>{{ $category->id }}</td>
										<td>{{ $category->name }}</td>
										<td>{{ count($category->products) }}</td>
										<td>{{ $category->created_at }}</td>
										<td>
											<div class="btn-group btn-group-sm">
												<a role="button" href="{{ url( 'categories/'.$category->id.'/edit') }}" class="btn btn-primary">
													<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
												</a>
												@if( count($category->products) == 0 )
						                    	<button role="button" type="submit" class="btn btn-danger" form="form-delete-{{ $category->id }}">
						                    		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
						                    	</button>
						                    	@endif
											</div>
												@if( count($category->products) == 0 )
													{!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy',$category->id], 'id' => 'form-delete-'.$category->id ]) !!} 
		                							{!! Form::close(); !!} 
		                						@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@include('products.create')
	@include('categories.create')
	@include('products.edit')
	@include('categories.edit')
@endsection
@section('script')
@if(!empty($productEdit))
	<script>
	$(function() {
	    $('#edit-modal').modal('show');
	});
	</script>
@endif
@if(!empty($categoryEdit))
	<script>
	$(function() {
	    $('#edit-modal-category').modal('show');
	});
	</script>
@endif
@endsection