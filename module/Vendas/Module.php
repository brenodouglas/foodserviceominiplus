<?php

namespace Vendas;

class Module
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller      = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config          = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 99);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig(){
        return array(
            'factories' => array(
                'Vendas\Service\Cliente' => function($e){
                    return new \Vendas\Service\Cliente($e->get("Doctrine\ORM\EntityManager"));
                },
                'Vendas\Service\Pedido' => function($e) {
                    return new \Vendas\Service\Pedido($e->get("Doctrine\ORM\EntityManager"));
                },
                'Vendas\Service\ProdutoHasPedido' => function($e){
                    return new \Vendas\Service\ProdutoHasPedido($e->get("Doctrine\ORM\EntityManager"));
                },
                'Vendas\Service\PedidoItens' => function($e){
                    return new \Vendas\Service\PedidoItens($e->get("Doctrine\ORM\EntityManager"));
                }
            ),
        );
    }
}
