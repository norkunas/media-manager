{{~it.files :file}}
<li data-type="{{=file.type}}" data-path="{{=file.path}}" data-name="{{=file.name}}" data-extension="{{=file.extension}}" data-mime="{{=file.mime}}" data-url="{{=file.url}}">
 <figure>
  <a href="javascript:void(0);">
   {{? file.type == 'directory' }}
    <i class="glyphicon glyphicon-folder-close"></i>
   {{?? file.type == 'image'}}
    {{? file.thumbnail }}
     <img src="{{=file.thumbnail}}" width="144" height="100" alt="{{=file.name}}" title="{{=file.name}}">
    {{??}}
     <i class="glyphicon glyphicon-picture"></i>
    {{?}}
   {{?? file.type == 'video' }}
    <i class="glyphicon glyphicon-film"></i>
   {{?? file.type == 'audio' }}
    <i class="glyphicon glyphicon-music"></i>
   {{?? file.type == 'application' }}
    <i class="glyphicon glyphicon-file"></i>
   {{?? file.type == 'text' }}
    <i class="glyphicon glyphicon-file"></i>
   {{?? file.type == 'inode' }}
    <i class="glyphicon glyphicon-file"><!-- blank file --></i>
   {{?}}
  </a>
  <a href="javascript:void(0);"><span>{{=file.name}}</span></a>
 </figure>
</li>
{{~}}