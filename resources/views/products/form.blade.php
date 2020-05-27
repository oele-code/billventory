<div class="form-group">
	{!! Form::label('provider_id','Proveedor :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::select('provider_id',$providers,null,['class' => 'form-control s2','style' => 'width:100%','required']) !!}
		 <small class="text-danger">{{ $errors->first('provider_id') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('category_id','Categoria :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::select('category_id',$listCategories,null,['class' => 'form-control s2','style' => 'width:100%','required']) !!}
		 <small class="text-danger">{{ $errors->first('category_id') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('reference','Referencia :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('reference',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('reference') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('name','Nombre :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('stock','billventory :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::number('stock', null,['class' => 'form-control number','required','min' => '1']) !!}
		 <small class="text-danger">{{ $errors->first('stock') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('price','Precio :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::number('price', null,['class' => 'form-control','required','placeholder' => 'Valor de venta']) !!}
		 <small class="text-danger">{{ $errors->first('price') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('cost','Costo :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::number('cost', null,['class' => 'form-control','required','placeholder' => 'Valor de compra']) !!}
		 <small class="text-danger">{{ $errors->first('cost') }}</small>
	</div>
</div>


<div class="form-group">
	{!! Form::label('user_id','Por :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		<span class="form-control">{{ Auth::user()->email }}</span>
		{!! Form::hidden('user_id', Auth::user()->id ) !!}
	</div>
</div>
