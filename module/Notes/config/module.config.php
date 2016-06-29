<?php

namespace Notes;

use Notes\Controller\IndexController;
use Notes\Factory\Controller\IndexControllerFactory;
use Notes\Factory\Service\NoteServiceFactory;
use Notes\Service\NoteService;
use Notes\Form\NotesForm;
use Notes\Factory\Form\NotesFormFactory;

return [
    'router' => [
        'routes' => [
            'notes' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route' => '/notes',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'add' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => IndexController::class,
                                'action' => 'add',
                            ],
                        ],
                    ],
                    'edit' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/edit/:id',
                            'defaults' => [
                                'controller' => IndexController::class,
                                'action' => 'edit'
                            ],
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                        ],
                    ],
                    'delete' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/delete/:id',
                            'defaults' => [
                                'controller' => IndexController::class,
                                'action' => 'delete'
                            ],
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            IndexController::class => IndexControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            NoteService::class => NoteServiceFactory::class,
            NotesForm::class => NotesFormFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'notes' => __DIR__ . '/../view',
        ],
    ],
];
