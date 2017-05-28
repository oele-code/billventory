@if(!empty($userEdit))
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="Edit user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar empleado</h4>
      </div>
      <div class="modal-body">
        {!! Form::model($userEdit,['method' => 'PATCH', 'route' => ['users.update', $userEdit->id] , 'id' => 'form-edit','class' => 'form-horizontal']) !!}
          @include('users.form')
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