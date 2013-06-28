<?php
namespace Vendas\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

class VendasController extends AbstractActionController{
    
    private $em;
    
    public function newAction(){
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findBy(array('item' => false));
        
        return new ViewModel(array('produtos' => $produtos));
    }
    
     public function adicionaAction(){
        
        if($this->getRequest()->isPost()){
            $dados = $this->getRequest()->getPost()->toArray();
            $produto = $this->getEm()->getRepository('Base\Entity\Produto')->findOneBy(array('id' => $dados['id']));
            $array = new \ArrayIterator();
            foreach($produto->getItens() as $itens){
                $array->append($itens->toArray());
            }
            $itens = $array->getArrayCopy();
        }
        
        return new JsonModel(array('data' => array($produto->toArray()),'itens' => $itens));
    }
    
    public function addProdutoAction(){
        $data = array();
        if($this->getRequest()->isPost()){
            $pedido = $this->getEm()->getRepository('Base\Entity\Pedido')->last();
            $dados = $this->getRequest()->getPost()->toArray();
            $dados['pedido'] = $pedido;
            
            $service1 = $this->getServiceLocator()->get("Vendas\Service\ProdutoHasPedido");
            $dados = $service1->insert($dados);
            
        }
        
        return new JsonModel(array('data' => $data));
    }
    
    public function getEm(){
        if($this->em == null)
            $this->em = $this->getServiceLocator ()->get("Doctrine\ORM\EntityManager");
        
        return $this->em;
    }
}

