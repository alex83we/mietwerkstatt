<?php

return [
    'route' => [
        'attributes' => [
            'prefix' => 'pdf',
            'middleware' => ['auth', 'verified'],
        ],
    ],
];
