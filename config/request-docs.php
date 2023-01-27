<?php

return [
    // change it to true will make lrd to throw exception if rules in request class need to be changed
    // keep it false
    'debug' => false,
    'document_name' => 'LRD',

    /*
    * Route where request docs will be served from
    * localhost:8080/request-docs
    */
    'url' => 'request-docs',
    'middlewares' => [
        //Example
        // \App\Http\Middleware\NotFoundWhenProduction::class,
    ],

    /*
    * Default headers shown on the request headers editor
    */
    'default_request_headers' => [
        'Accept' => 'application/json',
        'X-CSRF-TOKEN' => '',
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTIwZDNkNzhlMzQ5ZDgxYTg1NTgyYjQ1MWUzMjQ4ZTQ0ZGI3NjBiYjg5OTUyYWRjMjA5YTY4MWIxODgwYjMzOTk4ZjVmM2E1ZjQzNzJmOTkiLCJpYXQiOjE2NzQwMTk5NTcuOTgzMjkyLCJuYmYiOjE2NzQwMTk5NTcuOTgzMjk5LCJleHAiOjE2NzY2OTgzNTcuOTYzMjM5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.lLDW8USFy1S7Qzpi0s7TlPYemvS_qXHvPpHIiCsmiL9IpQADuWB8IXRFMPZA6xb8I3KBm6NtxV_drQWqJhTrrazc7FaRe7JaZSWaTOldtk1b4zpTP9CUHMC0lrFsbQ8ao32T9slp3gyMK81FNCTVNxBAzb2IILZml9WMlImZDzyLOhluYo9Spqvo7DPVuO6KgiZwgaP5PsiMQiSd9s42-LzZ-2OdWMgZDq_9nEeTRBp052lmcpjOjRgeUVZcp1rywZtquaCeibVdDRyUWXZfrcKrK7P5iTyvsaI077oqHvmsOsMQixz42hODh3798_N4YhNcFG_gBBkaHheD4THPvUDVxXBK7gQs3Oj5bcKn-06en4-RhLOx40wsnFdwXAKjJ0F1SMAqlv5FKAkN3nTV1G6TLA8cD8IOIj_VWJjiq6lPWZ2ygulPRbg_MBB0s-5oA-UfZ2OS3ztLiy6inm5jNvrDUa1hLN1Ukf7DEvxdFT2dI12JkeZ6Ou9MiQYa6ALYSktWWfqK79_htEN9CcsWv2rcQpMvaBwVePu2i3ggP54EMZXZC1E97SS5vhlLfLEuIc3Z_ZbY7F4d5KCt-gXhjUx6LQAsSTtpS3Ce68jHMPpx1fTXZ2bvU1jPFNZvsaJn8mtGWIXIxMSIjr1zKU1BiDmcsd4s6FHD5ECaPO3NzS0',
    ],

    /*
    * Show development relevant metadata on endpoints
    */
    'show_development_metadata' => true,

    /**
     * Path to to static HTML if using command line.
     */
    'docs_path' => base_path('docs/request-docs/'),

    /**
     * Sorting route by and there is two types default(route methods), route_names.
     */
    // 'sort_by' => '',

    //Use only routes where ->uri start with next string Using Str::startWith( . e.g. - /api/mobile
    'only_route_uri_start_with' => 'api',

    'hide_matching' => [
        '#^telescope#',
        '#^docs#',
        '#^request-docs#',
        '#^api-docs#',
        '#^sanctum#',
        '#^_ignition#',
        '#^_tt#',
    ],

    'request_methods' => [
        'rules',
        'onCreate',
        'onUpdate',
    ],

    'open_api' => [
        // default version that this library provides
        'version' => '3.0.0',
        // changeable
        'document_version' => '1.0.0',
        // license that you want to display
        'license' => 'Apache 2.0',
        'license_url' => 'https://www.apache.org/licenses/LICENSE-2.0.html',
        'server_url' => env('APP_URL', 'http://localhost'),

        // for now putting default responses for all. This can be changed later based on specific needs
        'responses' => [
            '200' => [
                'description' => 'Successful operation',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            '400' => [
                'description' => 'Bad Request',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            '401' => [
                'description' => 'Unauthorized',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            '403' => [
                'description' => 'Forbidden',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            '404' => [
                'description' => 'Not Found',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            '422' => [
                'description' => 'Unprocessable Entity',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            '500' => [
                'description' => 'Internal Server Error',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            'default' => [
                'description' => 'Unexpected error',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
