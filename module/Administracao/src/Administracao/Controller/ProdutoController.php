<?php
namespace Administracao\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class ProdutoController extends AbstractActionController{
    
    private $em;
    
    public function indexAction(){
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findAll();
        
        return new ViewModel(array('produto' => $produtos));
    }
    
    public function populaAction(){
        $produtos = '';
        if($this->getRequest()->isPost()){
            $id = $this->getRequest()->getPost()->toArray();
            $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->find($id['id']);
            $produtos = $produtos->toArray();
        }
        
        return new JsonModel(array('data'=>array($produtos)));
    }
    
    public function editeAction() {
        $valor = 0;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Produto');
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
            $service = $this->getServiceLocator()->get('Administracao\Service\Produto');
            $valor = $this->getRequest()->getPost()->toArray();
            $entity  = $service->insert($valor);
            if($entity){
                $valor = 1;
            }
            
        }
        return new JsonModel(array('data'=>array('valor'=>$valor)));
    }
    
    public function newAction(){
        $request = $this->getRequest();
        $viewModel = new ViewModel();
        if($request->isPost()){
        }
        return $viewModel;
    }
    
    public function editarAction(){
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findAll();
        
        return new ViewModel(array('produtos' => $produtos));
    }
    
    public function deletarAction(){
        $produtos = $this->getEm()->getRepository('Base\Entity\Produto')->findAll();
        $success = false;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Produto');
            $dados = $this->getRequest()->getPost()->toArray();
            $entity = $service->delete($dados);
            $success = "verdade";
        }
        return new ViewModel(array('produtos' => $produtos, 'enviado' => $success));
    }
    
    public function getEm(){
        if($this->em == null){
            $this->em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        }
        return $this->em;
    }
}
