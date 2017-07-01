<!-- Modal -->
<div class="modal fade" id="new-modal" tabindex="-1" role="dialog" aria-labelledby="New user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo proveedor</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['method' => 'POST', 'route' => 'providers.store', 'id' => 'form-save','class' => 'form-horizontal']) !!}
          @include('providers.form')
        {!! Form::close() !!}    
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          {!! Form::submit('Registrar',[ 'class' => 'btn btn-primary','form' => 'form-save']) !!}
        </div>
      </div>
    </div>
  </div>
</div>