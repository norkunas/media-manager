<div tabindex="-1" role="dialog" aria-hidden="true" class="modal fade media-manager-upload">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    {{ Form::open(array('url' => 'javascript:void(0);', 'files' => true, 'role' => 'form', 'class' => 'dropzone')) }}
    {{ Form::close() }}
   </div>
   <div class="modal-footer">
    {{ Form::button(Lang::get('media-manager::media.close'), array('data-dismiss' => 'modal', 'class' => 'btn btn-primary')) }}
   </div>
  </div>
 </div>
</div>