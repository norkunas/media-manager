<div tabindex="-1" role="dialog" aria-hidden="true" class="modal fade media-manager-confirm">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body"></div>
   <div class="modal-footer">
    {{ Form::button(Lang::get('media-manager::media.close'), array('data-dismiss' => 'modal', 'class' => 'btn btn-default')) }}
    {{ Form::button(Lang::get('media-manager::media.confirm'), array('class' => 'btn btn-primary btn-confirm')) }}
   </div>
  </div>
 </div>
</div>