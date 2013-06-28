<?php
namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Console\Prompt;

class IndexController extends AbstractActionController{
    
    public function indexAction() {
        
        return new ViewModel(array('nome' => 'Breno'));
    }
    
}
