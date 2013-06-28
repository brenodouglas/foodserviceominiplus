<?php

namespace Administracao;

use Administracao\Service\Produto,
    Administracao\Service\Item,
    Administracao\Service\Funcionario;

class Module
{

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
                'Administracao\Service\Produto' => function($e){
                    return new Produto($e->get('Doctrine\ORM\EntityManager'));
                },
                'Administracao\Service\Item' => function($e) {
                    return new Item($e->get('Doctrine\ORM\EntityManager'));
                },
                'Administracao\Service\Funcionario' => function($e) {
                    return new Funcionario($e->get('Doctrine\ORM\EntityManager'));
                }
            ),
        );
    }
}
