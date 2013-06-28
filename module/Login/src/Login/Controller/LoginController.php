<?php
namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;

class LoginController extends AbstractActionController{
    
    public function indexAction() {
        
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        
        if($this->getRequest()->isPost()){
            $dados = $this->getRequest()->getPost()->toArray();
            
            $session = new Session('user');
            $authentication = new AuthenticationService;
            $authentication->setStorage($session);
            
            $auth = $this->getServiceLocator()->get('Login\Auth\AuthAdapter');
            $auth->setUsername($dados['usuario'])->setPassword($dados['senha']);
            
            $result = $authentication->authenticate($auth);
            
            if($result->isValid()){
                $users = $result->getIdentity();
                $user = $users['user'];
                $session->write($user,null);
                $this->redirect()->toRoute('admin-pedidos',array('controller' => 'produto'));
            } else {
               $viewModel->setVariable('error', true); 
            }
            
            
        }
        
        
        return $viewModel;
    }
    
    public function logoutAction() {
        $session = new Session('user');
        $authentication = new AuthenticationService;
        $authentication->setStorage($session);
        $authentication->clearIdentity();
        return $this->redirect()->toRoute('route-login');
        
    }
}

