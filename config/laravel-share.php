<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Specify the base uri for each service.
    |
    |
    |
    */

    'services' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'text' => 'Gerade bei #MietwerkstattRoßleben gefunden. Wie findest du das ',
        ],
        'linkedin' => [
            'uri' => 'http://www.linkedin.com/shareArticle',
            'extra' => ['mini' => 'true'],
        ],
        'whatsapp' => [
            'uri' => 'https://web.whatsapp.com/send?text=Gerade%20bei%20#Mietwerkstatt-Roßleben%20gefunden.%20Wie%20findest%20du%20das?%0D%0A%0D%0A',
            'extra' => ['mini' => 'true'],
        ],
        'pinterest' => [
            'uri' => 'http://pinterest.com/pin/create/button/?url=',
        ],
        'reddit' => [
            'uri' => 'https://www.reddit.com/submit',
            'text' => 'Gerade bei #MietwerkstattRoßleben gefunden. Wie findest du das ',
        ],
        'telegram' => [
            'uri' => 'https://telegram.me/share/url',
            'text' => 'Gerade bei #MietwerkstattRoßleben gefunden. Wie findest du das ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Font Awesome
    |--------------------------------------------------------------------------
    |
    | Specify the version of Font Awesome that you want to use.
    | We support version 4 and 5.
    |
    |
    */

    'fontAwesomeVersion' => 5,
];
