<?php

namespace Login;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Livraria\Model\CategoriaTable;
use Login\Auth\AuthAdapter;
use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session;

use Zend\ModuleManager\ModuleManager;

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
    
    public function init(ModuleManager $moduleManager){
        
        $events = $moduleManager->getEventManager()->getSharedManager();
        $events->attach("Zend\Mvc\Controller\AbstractActionController", MvcEvent::EVENT_DISPATCH, 
                array($this,'validaAuth'), 100);
    }
    
    public function validaAuth(MvcEvent $e){
        $auth = new AuthenticationService;
        $auth->setStorage(new Session('user'));
        
        $controller = $e->getTarget();  
        $route = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
        
        if(!$auth->hasIdentity() and $route != 'route-login')
            return $controller->redirect()->toRoute('route-login');
    }
    
    public function getServiceConfig(){
        return array(
            'factories' => array(
                'Login\Auth\AuthAdapter' => function($e){
                    return new AuthAdapter($e->get("Doctrine\ORM\EntityManager")); 
                },
            ),
        );
    }   
    
    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'UserIdentity' => new View\Helper\UserIdentity(),
            ),
        );
    }
}
