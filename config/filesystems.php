<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads'),
            'url' => env('APP_URL').'storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads'),
            'url' => env('APP_URL').'storage/uploads',
            'visibility' => 'public',
            'throw' => false,
        ],

        'carousel' => [
            'driver' => 'local',
            'root' => storage_path('app/public/carousel'),
            'url' => env('APP_URL').'storage/carousel',
            'visibility' => 'public',
            'throw' => false,
        ],

        'news' => [
            'driver' => 'local',
            'root' => storage_path('app/public/news'),
            'url' => env('APP_URL').'storage/news',
            'visibility' => 'public',
            'throw' => false,
        ],

        'gallery_photo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/gallery/photo'),
            'url' => env('APP_URL').'storage/gallery/photo',
            'visibility' => 'public',
            'throw' => false,
        ],

        'gallery_video' => [
            'driver' => 'local',
            'root' => storage_path('app/public/gallery/video'),
            'url' => env('APP_URL').'storage/gallery/video',
            'visibility' => 'public',
            'throw' => false,
        ],

        'infobase' => [
            'driver' => 'local',
            'root' => storage_path('app/public/infobase'),
            'url' => env('APP_URL').'storage/infobase',
            'visibility' => 'public',
            'throw' => false,
        ],

        //announcement
        'announcement' => [
            'driver' => 'local',
            'root' => storage_path('app/public/announcement'),
            'url' => env('APP_URL').'storage/announcement',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
