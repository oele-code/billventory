<div class="form-group">
	{!! Form::label('number','Identificación :',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('number',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('email') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('fname','Nombre',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('fname',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('fname') }}</small>
	</div>
</div>

<div class="form-group">
	{!! Form::label('lname','Apellido',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('lname',null,['class' => 'form-control','required']) !!}
		 <small class="text-danger">{{ $errors->first('lname') }}</small>
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
	{!! Form::label('address','Dirección',['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('address',null,['class' => 'form-control']) !!}
		 <small class="text-danger">{{ $errors->first('address') }}</small>
	</div>
</div>

