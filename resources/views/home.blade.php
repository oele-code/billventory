@extends('app')

@section('content')
<div class="row">
		{!! Form::open(['method' => 'POST', 'route' => 'sales.store']) !!}
		<div class="col-md-7">

			<div class="panel panel-default">
				<div class="panel-heading">
					
					<div class="form-group">
			            <label for="new_product" class="col-sm-2">Producto:</label>
			            <div class="col-sm-9">
				            <select id="new_product" name="new_product" id="new_product" class="form-control select2" style="width: 100%;">
				            	<option value="" selected>...</option>
				              @foreach( $products as $product)
				              	<option value="{{ $product->id }}" data-reference="{{ $product->reference }}" data-name="{{ $product->name }}"data-price="{{ $product->price }}" >{{ $product->reference.' '.$product->name.' '.$product->category->name }}</option>
				              @endforeach
				            </select>
							<small class="text-danger">{{ $errors->first('new_product') }}</small>
			            </div>
			            <button id="btn-refresh" class="btn btn-primary pull-right" type="button"><i class="glyphicon glyphicon-refresh"></i></button>
		      		</div>
		      		<br>
				</div>
				<div class="panel-body">
		      		<div class="table-responsive col-xs-12">
						<table id="products" class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Referencia</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Descuento</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-5">
			
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="form-group">
			            <label for="customer_id">Cliente:</label>
			            <select id="customer_id" name="customer_id" id="customer_id" class="form-control select2" style="width: 100%;" required>
			            <option value="" selected>...</option>
			            @foreach( $customers as $customer)
			            	<option value="{{ $customer->id }}">{{ $customer->number.' '.$customer->fname.' '.$customer->lname }}</option>
			            @endforeach
			            </select>
			            <small class="text-danger">{{ $errors->first('customer_id') }}</small>
		      		</div>
		      		<!-- /form-group -->
					
					<div class="form-group has-success">
						<label for="total">Total</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>

							{!! Form::number('totalAll',null,['id' => 'total','class' =>'form-control input-lg text-right','required','min' => '0']) !!}

						</div>
					</div>
					<!-- /form-group -->

					<button type="submit" class="btn btn-success btn-lg btn-block">
						<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Vender
					</button>

				</div>
				<!-- ./panel-body -->
			</div>
			<!-- ./panel -->
		</div>
		{!! Form::close() !!} 
</div>
@endsection
@section('script')
	@if(Session::has('download.sale'))
	<script>
	  myWindow=window.open('{{ Session::get('download.sale') }}','','');
	  myWindow.focus();
	  // myWindow.print(); 
	</script>
	@endif
	<script>
	$(function() {

	    $('.select2').select2({
	      theme: "bootstrap",
	      minimumResultsForSearch: 5,
	      minimumInputLength: 1,
	      language: {
	        "noResults": function(){
	          return "No se encontraron resultados";
	        }
	      }
	    });

	   $("#new_product").bind("change keypress", function() {
		  	if (window.event.keyCode === 13) {
			  	var product = $(this).find('option:selected');
			  	var row = "<tr><td><input type='hidden' name='prod_id[]' value='"+ product.val() +"'>";
			        row += product.data('reference') +"</td>";
	  			    row += "<td>"+ product.data('name') +"</td>";
	  			    row += "<td class='price'>"+ product.data('price') +"</td>";
	  			    row += "<td><input type='number' name='qty[]'  value='1' min='1' class='qty form-control text-right'></td>";
	  			    row += "<td><input type='number' name='desc[]' value='0' min='0' class='desc form-control text-right'></td>";
	  			    row += "<td><input type='number' name='total[]' value='"+ product.data('price') +"' min='0' class='total form-control text-right' readOnly></td>";
	  			    row += "<td><a href='#!' class='btn btn-sm btn-danger remove'>";
	  			    row += "<i class='glyphicon glyphicon-remove'></i></a></td></tr>";

	  			$("#products tbody").append(row);

				var sum = 0;
				$('.total').each(function(){
				    sum += parseFloat( $(this).val() );  // Or this.innerHTML, this.innerText
				});
				$('#total').val( sum );
			}
		})
	   $(document).on('click',function(e){
	   		$("#new_product").val('').trigger('change');
	   });

	   $(document).on('click',"a.remove",function(e){
	   		
			$('#total').val( $('#total').val() - $(this).parents('tr').find('.total').val() );
			$(this).parents('tr').html('');
	   });

	   $(document).on('change', ".qty", function (e) {
	   		
	   		$("#new_product").val('').trigger('change');

	   		var tr = $(this).parents('tr');
	   		var price = tr.find('.price').html();
	   		var desc  = tr.find('.desc').val();
	   		tr.find('input.total').val( price * $(this).val() - desc );

	   		var sum = 0;
			$('.total').each(function(){
			    sum += parseFloat( $(this).val() );  // Or this.innerHTML, this.innerText
			});
			$('#total').val( sum );
	   });

	   $(document).on('change', ".desc", function (e) {
	   		
	   		$("#new_product").val('').trigger('change');
	   		
	   		var tr    = $(this).parents('tr');
	   		var price = tr.find('.price').html();
	   		var total = price * tr.find('.qty').val();
	   		var desc  = tr.find('.desc').val();

	   		tr.find('input.total').val( total - desc );

	   		var sum = 0;
			$('.total').each(function(){
			    sum += parseFloat( $(this).val() );  // Or this.innerHTML, this.innerText
			});
			$('#total').val( sum );
	   });

	});
	</script>
@endsection