<div tabindex="-1" role="dialog" aria-labelledby="mediaManagerCreateFolderLabel" aria-hidden="true" class="modal fade media-manager-create-folder">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
    <h4 class="modal-title" id="mediaManagerCreateFolderLabel">{{{ Lang::get('media-manager::media.create_folder') }}}</h4>
   </div>
   <div class="modal-body">
    {{ Form::open(array('role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
     <div class="col-md-12">
      {{ Form::text('title', null, array('class' => 'form-control')) }}
     </div>
    </div>
    {{ Form::close() }}
   </div>
   <div class="modal-footer">
    {{ Form::button(Lang::get('media-manager::media.close'), array('data-dismiss' => 'modal', 'class' => 'btn btn-default')) }}
    {{ Form::button(Lang::get('media-manager::media.create_folder'), array('class' => 'btn btn-primary btn-create-folder')) }}
   </div>
  </div>
 </div>
</div>