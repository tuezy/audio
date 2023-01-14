<?php
return [
    'website' => [
        'title' => [
            'key'       =>  'dashboard.website.title',
            'type'      =>  'input.text',
            'validate'  =>  'required',
            'default'   =>  'Laravel'
        ],
        'down' => [
            'key'       => 'dashboard.website.down',
            'type'      => 'input.boolean',
            'default'   => false
        ]
    ],
    'upload' => [
        'allow_member_upload' => [
            'key'   => 'dashboard.upload.allow_member_upload',
            'type'  => 'input.boolean',
            'default'   => true
        ],
        'auto_delete' => [
            'key'   => 'dashboard.upload.auto_delete',
            'type'  => 'input.number',
            'default'   => 15,
            'validate' => 'required|numeric',
            'with'  => 'days'
        ],
        'storage_per_member' => [
            'key'   => 'dashboard.upload.storage_per_member',
            'type'  => 'input.number',
            'default'   => 2000,
            'validate' => 'required|numeric',
            'with' => 'MB'
        ]
    ]
];
