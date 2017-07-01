@if(!empty($productEdit))
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="Edit user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar producto</h4>
      </div>
      <div class="modal-body">
        {!! Form::model($productEdit,['method' => 'PATCH', 'route' => ['products.update', $productEdit->id] , 'id' => 'form-edit','class' => 'form-horizontal']) !!}
          @include('products.form')
        {!! Form::close() !!}    
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary','form' => 'form-edit']) !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endif