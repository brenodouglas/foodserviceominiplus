<?php
return array(
    'router' => array(
        'routes' => array(
            'padrao' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '[/:controller[/:action]]',
                    'defaults' => array(
                        'controller' => 'Produto',
                    )
                ),
            ),
            'admin-index' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/index[/:controller]',
                    'defaults' => array(
                        'action' => 'index'
                    ), 
                ),
            ),
            'new' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/novo[/:controller]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Adminstracao\Controller',
                        'controller' => 'Produto',
                        'action'     => 'new'
                    )
                ),
            ),
            'edit' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/editar[/:controller]',
                    'defaults' => array(
                        'controller' => 'Produto',
                        'action' => 'editar',
                    ),
                ),
            ),
            'delete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/deletar[/:controller]',
                    'defaults' => array(
                        'controller' => 'Produto',
                        'action' => 'deletar',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
             'Administracao\Controller\Index' => 'Administracao\Controller\IndexController',
             'Produto' => 'Administracao\Controller\ProdutoController',
             'Itens' => 'Administracao\Controller\ItensController',
             'Terminal' => 'Administracao\Controller\TerminalController',
             'Funcionario' => 'Administracao\Controller\FuncionarioController',
             
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/admin'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);