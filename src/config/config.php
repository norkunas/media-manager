<?php
return array(
    'locale' => 'en',
    'path' => array(
        'uploads' => public_path('uploads'),
        'thumbnails' => public_path('thumbs/media-manager')
    ),
    'url' => array(
        'uploads' => URL::to('uploads'),
        'thumbnails' => URL::to('thumbs/media-manager')
    )
);
