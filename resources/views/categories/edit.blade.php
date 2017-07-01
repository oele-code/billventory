@if(!empty($categoryEdit))
<!-- Modal -->
<div class="modal fade" id="edit-modal-category" tabindex="-1" role="dialog" aria-labelledby="Edit user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar categoría</h4>
      </div>
      <div class="modal-body">
        {!! Form::model($categoryEdit,['method' => 'PATCH', 'route' => ['products.update', $categoryEdit->id] , 'id' => 'form-edit-category','class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label('category_name','Nombre :',['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
              {!! Form::text('category_name',null,[ 'class'=> 'form-control','required']) !!}
              <small class="text-danger">{{ $errors->first('category_name') }}</small>
            </div>
          </div>

        {!! Form::close() !!}    
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary','form' => 'form-edit-category']) !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endif