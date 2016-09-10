<?php

namespace config;
class Routs
{
    public $config = [
        'modules' =>
            [
                '404' => [
                    'controller' => 'Error404Controller',
                    'actions' =>
                        [
                            '' => "index",
                        ]
                ],
                'country' => [
                    'controller' => 'CountryController',
                    'actions' =>
                        [
                            '' => "index",
                            'views' => "index",
                            'edit' => "edit",
                            'create' => "create",
                        ]
                ],
                'city' => [
                    'controller' => 'CityController',
                    'actions' =>
                        [
                            'views' => "index",
                            'edit' => "edit",
                            'create' => "create",
                        ]
                ],
                'dancers' => [
                    'controller' => 'DancersController',
                    'actions' =>
                        [
                            'views' => "index",
                            'edit' => "edit",
                            'create' => "create",
                        ]
                ],
                'pairs' => [
                    'controller' => 'PairsController',
                    'actions' =>
                        [
                            'views' => "index",
                            'create' => "create",
                        ]
                ],
                'paircoach' => [
                    'controller' => 'PairsCoachController',
                    'actions' =>
                        [
                            'views' => "index",
                            'create' => "create",
                        ]
                ],
                '' => [
                    'controller' => 'HomeController',
                    'actions' =>
                        [
                            '' => "index",
                        ]
                ]

            ]];
}