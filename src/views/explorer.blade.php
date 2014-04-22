<div tabindex="-1" role="dialog" aria-labelledby="mediaManagerLabel" aria-hidden="true" class="modal fade media-manager">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
    <h4 class="modal-title" id="mediaManagerLabel">Media Manager</h4>
   </div>
   <div class="modal-body">
    <nav role="navigation" class="navbar navbar-default navbar-top">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#media-manager-navbar-collapse">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
      </button>
     </div>
     <div class="collapse navbar-collapse" id="media-manager-navbar-collapse">
      <ul class="nav navbar-nav">
       <li>
        <button title="{{{ Lang::get('media-manager::media.upload.title') }}}" data-toggle="tooltip" data-placement="top" data-action="upload" class="btn btn-default btn-sm action"><i class="glyphicon glyphicon-plus"></i> <i class="glyphicon glyphicon-file"></i></button>
       </li>
       <li><button title="{{{ Lang::get('media-manager::media.create_folder') }}}" data-toggle="tooltip" data-action="create-folder" class="btn btn-default btn-sm action"><i class="glyphicon glyphicon-plus"></i> <i class="glyphicon glyphicon-folder-open"></i></button></li>
       <li><button title="{{{ Lang::get('media-manager::media.refresh') }}}" data-toggle="tooltip" data-action="refresh" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></li></button>
       <li class="hide command-menu">
        <div class="btn-group select-list">
         <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
          {{{ Lang::get('media-manager::media.manage') }}} <span class="caret"></span>
         </button>
         <ul class="dropdown-menu" role="menu">
          <li><a href="javascript:void(0);" data-command="edit">{{{ Lang::get('media-manager::command.edit') }}}</a></li>
          <li><a href="javascript:void(0);" data-command="delete">{{{ Lang::get('media-manager::command.delete') }}}</a></li>
          <li><a href="javascript:void(0);" data-command="rename">{{{ Lang::get('media-manager::command.rename') }}}</a></li>
          <li><a href="javascript:void(0);" data-command="preview">{{{ Lang::get('media-manager::command.preview') }}}</a></li>
         </ul>
        </div>
       </li>
       <li><a>{{{ Lang::get('media-manager::filter.title') }}}:</a></li>
       <li><button title="{{{ Lang::get('media-manager::filter.all') }}}" data-toggle="tooltip" data-filter="" class="btn btn-primary btn-sm filter"><i class="glyphicon glyphicon-th-list"></i></button></li>
       <li><button title="{{{ Lang::get('media-manager::filter.folder') }}}" data-toggle="tooltip" data-filter="directory" class="btn btn-default btn-sm filter"><i class="glyphicon glyphicon-folder-close"></i></button></li>
       <li><button title="{{{ Lang::get('media-manager::filter.file') }}}" data-toggle="tooltip" data-filter="file" class="btn btn-default btn-sm filter"><i class="glyphicon glyphicon-file"></i></button></li>
       <li><button title="{{{ Lang::get('media-manager::filter.image') }}}" data-toggle="tooltip" data-filter="image" class="btn btn-default btn-sm filter"><i class="glyphicon glyphicon-picture"></i></button></li>
       <li><button title="{{{ Lang::get('media-manager::filter.video') }}}" data-toggle="tooltip" data-filter="video" class="btn btn-default btn-sm filter"><i class="glyphicon glyphicon-film"></i></button>
       <li><button title="{{{ Lang::get('media-manager::filter.audio') }}}" data-toggle="tooltip" data-filter="audio" class="btn btn-default btn-sm filter"><i class="glyphicon glyphicon-music"></i></button>
       <li>
        <div class="btn-group select-list">
         <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
          {{{ Lang::get('media-manager::sort.title') }}} <span class="caret"></span>
         </button>
         <ul role="menu" class="dropdown-menu sort-menu">
          <li data-sortby="name"><a href="javascript:void(0);"><i class="glyphicon glyphicon-ok" id="sort-mark"></i> {{{ Lang::get('media-manager::sort.name') }}}</a></li>
          <li data-sortby="type"><a href="javascript:void(0);">{{{ Lang::get('media-manager::sort.type') }}}</a></li>
          <li data-sortby="size"><a href="javascript:void(0);">{{{ Lang::get('media-manager::sort.size') }}}</a></li>
          <li data-sortby="date"><a href="javascript:void(0);">{{{ Lang::get('media-manager::sort.date') }}}</a></li>
         </ul>
        </div>
       </li>
       <li>
        <div class="btn-group select-list">
         <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
          {{{ Lang::get('media-manager::order.title') }}} <span class="caret"></span>
         </button>
         <ul role="menu" class="dropdown-menu order-menu">
          <li data-order="asc"><a href="javascript:void(0);"><i class="glyphicon glyphicon-ok" id="order-mark"></i> {{{ Lang::get('media-manager::order.ascending') }}}</a></li>
          <li data-order="desc"><a href="javascript:void(0);">{{{ Lang::get('media-manager::order.descending') }}}</a></li>
         </ul>
        </div>
       </li>
       <li>
        <form role="search" class="navbar-form navbar-right">
         <div class="input-group">
          <input type="text" placeholder="{{{ Lang::get('media-manager::search.placeholder') }}}" class="form-control input-sm search-query">
          <span class="input-group-btn">
           <button type="button" data-action="search" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i></button>
          </span>
         </div>
        </form>
       </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li></li>
      </ul>
     </div>
    </nav>
    <div class="manager-body">
     <ul class="breadcrumb">
      <li><i class="glyphicon glyphicon-home"></i></li>
      <li></li>
     </ul>
     <div class="grid-wrapper">
      <ul class="grid"></ul>
     </div>
    </div>
   </div>
   @if($insert)
   <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">{{{ Lang::get('media-manager::media.close') }}}</button>
    <button type="button" disabled="disabled" data-action="insert" class="btn btn-primary">{{{ Lang::get('media-manager::media.insert') }}}</button>
   </div>
   @endif
  </div>
 </div>
</div>