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
            'subMenuIcon' => '<b class="arrow fa fa-angle-down"></b>'


        ],

    ],
    'template' => 'flatlab',
    'AppName' => env('APP_NAME','Hydrogen'),
    'CompanyName' => env('COMPANY_NAME','Bakly Systems'),
];

