media-manager
=============
Laravel Media Manager v1.0.0

```
composer require norkunas/media-manager:dev-master
```

```
'Norkunas\MediaManager\MediaManagerServiceProvider'
```

```
<script src="{{ MediaManager::js() }}"></script>
<script>
(function(document) {
    document.addEventListener('DOMContentLoaded', function() {
        var manager = new MediaManager();
        manager.open();
    });
})(document);
</script>
```

```
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ MediaManager::js() }}"></script>
<script>
tinymce.init({
    selector: '#content',
    plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor mediamanager'],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | preview',
    image_advtab: true,
    relative_urls: false,
    remove_script_host: false
});

jQuery(function($) {
    var photo = $('#photo'),
        media = new MediaManager({
            onInsert: function(url) {
                photo.val(url);
            }
        });

    $('#select-photo').on('click', function() {
        media.open();
    });
});
</script>
```