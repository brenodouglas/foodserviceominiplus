<?php
return array(
     'router' => array(
        'routes' => array(
            'admin-vendas' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/index[/:controller]',
                    'defaults' => array(
                        'controller' => 'pedido',
                        'action' => 'index'
                    ), 
                ),
            ),
            'add-ajax' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ajax[/:controller[/:action]]',
                    'defaults' => array(
                        'controller' => 'pedido',
                    ),
                ),
            ),
            
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'Pedido' => 'Vendas\Controller\PedidosController',
            'Venda'  => 'Vendas\Controller\VendasController',
        ),
    ),
    'module_layouts' => array(
        'Administracao'  => 'layout/admin',
        'Pedidos' => 'layout/pedidos',
    ),
    
    'view_manager' => array(
        'display_not_found_reason'  => true,
        'display_exceptions'        => true,
        'doctype'                   => 'HTML5',
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'     => __DIR__ . '/../view/error/404.phtml',
            'error/index'   => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
);