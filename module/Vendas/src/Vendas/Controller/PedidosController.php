<?php
namespace Vendas\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

class PedidosController extends AbstractActionController{
    
    private $em;
    
    public function newAction(){
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findBy(array('item' => true));
        
        if($this->getRequest()->isPost()){
            echo "<script>alert('Pedido Efetuado com Sucesso!');</script>";
        }
        
        return new ViewModel(array('produtos' => $produtos));
    }
    
    
    public function adicionaAction(){
        
        if($this->getRequest()->isPost()){
            $dados = $this->getRequest()->getPost()->toArray();
            $produto = $this->getEm()->getRepository('Base\Entity\Produto')->findOneBy(array('id' => $dados['id']));$itens = array();
            $array = new \ArrayIterator();
            foreach($produto->getItens() as $itens){
                $array->append($itens->toArray());
            }
            $itens = $array->getArrayCopy();
        }
        
        return new JsonModel(array('data' => array($produto->toArray()),'itens' => $itens));
    }
    
    public function getEm(){
        if($this->em == null)
            $this->em = $this->getServiceLocator ()->get("Doctrine\ORM\EntityManager");
        
        return $this->em;
    }
    
    public function addClienteAction(){
        $dados = '';
        if($this->getRequest()->isPost()){
            $dados = $this->getRequest()->getPost()->toArray();
            $service = $this->getServiceLocator()->get('Vendas\Service\Cliente');
            $cliente = $service->insert($dados);
            $dados['cliente'] = $cliente;
            $service2 = $this->getServiceLocator()->get("Vendas\Service\Pedido");
            $service2->insert($dados);
        }
        
        return new JsonModel(array('data' => $dados));
    }
    
    public function addProdutoAction(){
        $data = array();
        if($this->getRequest()->isPost()){
            $pedido = $this->getEm()->getRepository('Base\Entity\Pedido')->last();
            $dados = $this->getRequest()->getPost()->toArray();
            $dados['pedido'] = $pedido;
            
            $service1 = $this->getServiceLocator()->get("Vendas\Service\ProdutoHasPedido");
            $dados['ProdutoPedido'] = $service1->insert($dados);
            
            $service2 = $this->getServiceLocator()->get("Vendas\Service\PedidoItens");
            $data = $service2->insert($dados);
            
        }
        
        return new JsonModel(array('data' => $data));
    }
    
    public function adAction(){
        
        return new JsonModel(array());
    }
}

