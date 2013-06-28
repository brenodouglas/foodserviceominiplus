<?php
return array(
    'router' => array(
        'routes' => array(
            'admin-relatorios' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/relatorio',
                    'defaults' => array(
                        'controller' => 'Relatorios\Controller\Index',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'Relatorios\Controller\Index' => 'Relatorios\Controller\IndexController',
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype'            => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'     => __DIR__ . '/../view/error/404.phml',
            'error/index'   => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    
);
