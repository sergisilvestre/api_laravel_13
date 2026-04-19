<?php

return [
    'default' => 'v1',

    'documentations' => [

        'v1' => [
            'api' => [
                'title' => 'API Laravel V1',
            ],
            'routes' => [
                'api' => 'api/v1/documentation',
            ],
            'paths' => [
                'annotations' => base_path('app/swagger/V1'),
            ],
        ],

        'v2' => [
            'api' => [
                'title' => 'API Laravel V2',
            ],
            'routes' => [
                'api' => 'api/v2/documentation',
            ],
            'paths' => [
                'annotations' => base_path('app/swagger/V2'),
            ],
        ],
    ],
];
