<?php
return array(
    'router' => array(
        'routes' => array(
            'admin-pedidos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/index[/:controller]',
                    'defaults' => array(
                        'controller' => 'pedido',
                        'action' => 'index'
                    ), 
                ),
            ),
            'status-pedido' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/pedidos[/:action]',
                    'defaults' => array(
                        'controller' => 'Pedidos',
                    )
                ),
            ),
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'Pedidos' => 'Pedidos\Controller\PedidosController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason'  => true,
        'display_exceptions'        => true,
        'doctype'                   => 'HTML5',
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'template_map' => array(
            'layout/pedidos' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'     => __DIR__ . '/../view/error/404.phtml',
            'error/index'   => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
        
    ),
);