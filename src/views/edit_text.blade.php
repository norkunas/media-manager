<div tabindex="-1" role="dialog" aria-labelledby="mediaManagerEditTextLabel" aria-hidden="true" class="modal fade media-manager-edit-text">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
    <h4 class="modal-title" id="mediaManagerEditTextLabel">{{{ Lang::get('media-manager::command.edit') }}}</h4>
   </div>
   <div class="modal-body">
    {{ Form::open(array('role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
     <div class="col-md-12">
      {{ Form::textarea('rename', null, array('rows' => 20, 'class' => 'form-control')) }}
     </div>
    </div>
    {{ Form::close() }}
   </div>
   <div class="modal-footer">
    {{ Form::button(Lang::get('media-manager::media.close'), array('data-dismiss' => 'modal', 'class' => 'btn btn-default')) }}
    {{ Form::button(Lang::get('media-manager::media.update'), array('class' => 'btn btn-primary btn-update')) }}
   </div>
  </div>
 </div>
</div>