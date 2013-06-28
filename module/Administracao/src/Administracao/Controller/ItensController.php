<?php
namespace Administracao\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;


class ItensController extends AbstractActionController{

    private $em;
    
    public function indexAction(){
        
        return new ViewModel(array());
    }
    
    public function newAction(){
        $data = \DateTime::createFromFormat("m-d-Y", "2013-06-07");
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findBy(array('item' => true));
        
        return new ViewModel(array('produtos' => $produtos));
    }
    
    
    public function editarAction(){
        $itens = $this->getEm()->getRepository('Base\Entity\ProdutoItens')->findAll();
        $produto = $this->getEm()->getRepository('Base\Entity\Produto')->findAll();
        
        return new ViewModel(array('itens' => $itens, 'produtos' => $produto));
    }
    
    
    public function deletarAction(){
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findAll();
        $success = false;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Item');
            $dados = $this->getRequest()->getPost()->toArray();
            $entity = $service->delete($dados['id']);
            $success = "verdade";
        }
        
        return new ViewModel(array('produtos'=> $produtos,'enviado' => $success));
    }
    
    public function populaAction(){
        $produto = '';
        $item = '';
        if($this->getRequest()->isPost()){
            $id = $this->getRequest()->getPost()->toArray();
            $itens = $this->getEm()->getRepository('Base\Entity\ProdutoItens')->find($id['id']);
            $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->fetchPairs();
            
            $produto = (array) $produtos;
            $item = $itens->toArray();
            $item['produto'] = array('id'=>$item['produto']->getId(), 'nome' => $item['produto']->getNome());
        }
        
        return new JsonModel(array('produtos'=>array($produto),'itens'=>array($item)));
    }
    
    public function editeAction() {
        $valor = 0;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Item');
            $valor = $this->getRequest()->getPost()->toArray();
            $entity  = $service->update($valor);
            if($entity){
                $valor = 1;
            }
        }
        
        return new JsonModel(array('data' => array('valor'=>$valor)));
    }
    public function insertAction(){
        $valor = 0;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Item');
            $valor = $this->getRequest()->getPost()->toArray();
            $entity  = $service->insert($valor);
            if($entity){
                $valor = 1;
            }
            
        }
        return new JsonModel(array('data'=>array('valor'=>$valor)));
    }
    
    public function getEm(){
        if($this->em == null)
            $this->em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        
        return $this->em;
    }
}
