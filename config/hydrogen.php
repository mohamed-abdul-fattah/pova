<?php
return [
    'templates' => [
        'flatlab' => [
            'parentUlClass' => 'sub',
            'childLiClass' => 'sub-menu',
            'iconClass' => 'fa',
            'subMenuIcon' => ''
        ],
        'ace' => [
            'parentUlClass' => 'submenu',
            'childLiClass' => '',
            'iconClass' => 'menu-icon fa ',
            'subMenuIcon' => '<i class="arrow fa fa-angle-down"></i>'
        ],
    ],
    'template' => 'flatlab',
    'AppName' => env('APP_NAME', 'Hydrogen'),
    'CompanyName' => env('COMPANY_NAME', 'EGYPOVA'),
];
