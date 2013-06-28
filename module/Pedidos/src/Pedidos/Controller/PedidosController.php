<?php
namespace Pedidos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

class PedidosController extends AbstractActionController{
    
    private $em;
    
    public function andamentoAction(){
        $pedidos = $this->getEm()->getRepository('Base\Entity\Pedido')->findBy(array('concluido' => false));
        
        return new ViewModel(array('pedidos' => $pedidos));
    }
    
    public function concluidosAction(){
        $pedidos = $this->getEm()->getRepository('Base\Entity\Pedido')->findBy(array('concluido' => true));
        
        return new ViewModel(array('pedidos' => $pedidos));
    }
    
    public function concluirPedidoAction() {
        $dados = '';
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost()->toArray();
            $service = $this->getServiceLocator()->get("Vendas\Service\Pedido");
            $service->updateConcluido($data);
            $dados = 1;
        } else {
            return $this->redirect()->toRoute('status-pedido',array('action' => 'concluidos'));
        }
        
        return new JsonModel(array('data' => array($dados)));
    }
    private function getEm(){
        if(!isset($this->em))
            $this->em = $this->getServiceLocator ()->get("Doctrine\ORM\EntityManager");
        
        return $this->em;
    }
}
