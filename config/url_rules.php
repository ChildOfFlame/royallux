<?php

return [
    [
        'pattern' => '',
        'route' => '',
        'suffix' => '',
    ],
    [
        'pattern' => '<action>',
        'route' => 'site/<action>',
        'suffix' => '',
    ],
    [
        'pattern' => '<module>/<controller>/<action>/<id:\d+>',
        'route' => '<module>/<controller>/<action>',
        'suffix' => '',
    ],
    [
        'pattern' => '<module>/<controller>/<action>',
        'route' => '<module>/<controller>/<action>',
        'suffix' => '.html',
    ],
    
    [
        'pattern' => '<controller>/<action>/<id:\w+>',
        'route' => '<controller>/<action>',
        'suffix' => '',
    ],
    [
        'pattern' => '<controller>/<action>',
        'route' => '<controller>/<action>',
        'suffix' => '.html',
    ],
];