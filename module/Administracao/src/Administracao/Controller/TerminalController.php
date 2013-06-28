<?php
namespace Administracao\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;


class TerminalController extends AbstractActionController{
    
    public function indexAction(){
        
        return new ViewModel();
    }
    
    public function newAction(){
        
        return new ViewModel();
    }
    
    public function editarAction(){
            
        return new ViewModel();
    }
    
    public function deletarAction(){
        
        return new ViewModel();
    }
}
