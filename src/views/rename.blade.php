<div tabindex="-1" role="dialog" aria-labelledby="mediaManagerRenameLabel" aria-hidden="true" class="modal fade media-manager-rename">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
    <h4 class="modal-title" id="mediaManagerRenameLabel">{{{ Lang::get('media-manager::command.rename') }}}</h4>
   </div>
   <div class="modal-body">
    {{ Form::open(array('role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
     <div class="col-md-12">
      {{ Form::text('rename', null, array('class' => 'form-control')) }}
     </div>
    </div>
    {{ Form::close() }}
   </div>
   <div class="modal-footer">
    {{ Form::button(Lang::get('media-manager::media.close'), array('data-dismiss' => 'modal', 'class' => 'btn btn-default')) }}
    {{ Form::button(Lang::get('media-manager::command.rename'), array('class' => 'btn btn-primary btn-rename')) }}
   </div>
  </div>
 </div>
</div>