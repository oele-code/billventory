<!-- Modal -->
<div class="modal fade" id="new-modal" role="dialog" aria-labelledby="New user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo producto</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['method' => 'POST', 'route' => 'products.store', 'id' => 'form-save','class' => 'form-horizontal']) !!}
          @include('products.form')
        {!! Form::close() !!}    
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          {!! Form::submit('Crear',[ 'class' => 'btn btn-primary','form' => 'form-save']) !!}
        </div>
      </div>
    </div>
  </div>
</div>