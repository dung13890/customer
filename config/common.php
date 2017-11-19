<?php

return [
    'category' => [
        'type' => ['post', 'product', 'article', 'introduce', 'distributor', 'recruitment', 'investor'],
        'id_system' => [1, 2, 3],
    ],

    'page' => [
        'type' => [
            'introduce', 'distributor', 'recruitment', 'investor'
        ],
    ],

    'slide' => [
        'type' => [
            'slide', 'page'
        ],
    ],

    'post' => [
        'type' => [
            'post', 'article'
        ],
    ],

    'menu' => [
        'post', 'product', 'introduce', 'distributor', 'recruitment', 'investor', 'link'
    ],

    'create_dt' => [
        'format' => 'd/m/Y H:i',
    ],

];
