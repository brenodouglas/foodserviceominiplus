<?php
namespace Login;

return array(
    'router'=>array(
        'routes'=>array(
            'login'=>array(
                'type'=>'Literal',
                'options'=>array(
                    'route'=>'/',
                    'defaults' => array(
                      '__NAMESPACE__' => 'Login\Controller',
                      'controller' => 'Login\Controller\Login',
                      'action' => 'index'
                  ),
                ),
            ),
            'route-login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'Login\Controller\Login',
                        'action' => 'index'
                    ),
                ),
            ),
            'route-logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'Login\Controller\Login',
                        'action' => 'logout'
                    ),
                ),
            ),
        ),
        
    ),
    
    'controllers' => array(
        'invokables' => array(
            'Login\Controller\Login' => 'Login\Controller\LoginController',
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
);
