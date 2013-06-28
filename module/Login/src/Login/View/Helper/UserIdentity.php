<?php
namespace Login\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;


class UserIdentity extends AbstractHelper{
    
    private $authService;
    
    public function getAuthService(){
        return $this->authService;
    }
    
    public function __invoke($namespace = null) {
        $session = new Session($namespace);
        $this->authService = new AuthenticationService;
        $this->authService->setStorage($session);
        
        if($this->getAuthService()->hasIdentity()){
            return $this->getAuthService()->getIdentity();
        } else {
            return false;
        }
    }
    
}
