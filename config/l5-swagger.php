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
                'docs' => 'docs',
            ],

            'paths' => [
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),

                'swagger_ui_assets_path' => env('L5_SWAGGER_UI_ASSETS_PATH', 'vendor/swagger-api/swagger-ui/dist/'),

                'docs_json' => 'api-docs.json',

                'annotations' => [
                    base_path('app/Api/V1'),
                ],
            ],
        ],
    ],
];
