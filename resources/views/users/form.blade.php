<div class="form-group">
	{!! Form::label('number','Identificación',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('number',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('email') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('name','Nombre completo',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('mobile','Teléfono',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('mobile',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('mobile') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('email','Correo',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::email('email',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('email') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('password','Contraseña',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::password('password',['class' => 'form-control']) !!}
		 <small class="text-danger">{{ $errors->first('password') }}</small>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-8 col-sm-offset-4">
		<label class="radio-inline">
			{!! Form::radio('type', '1', false) !!} Administrador
		</label>
		<label class="radio-inline">
			{!! Form::radio('type', '2', true) !!} Empleado
		</label>
	</div>
</div>

