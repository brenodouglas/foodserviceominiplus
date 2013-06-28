<?php
namespace Administracao\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

class FuncionarioController extends AbstractActionController{
    
    private $em;
    
    public function indexAction(){
        $funcionarios = $this->getEm()->getRepository('Base\Entity\Funcionario')->findAll();
        
        return new ViewModel(array('funcionarios' => $funcionarios));
    }
    
    public function newAction(){
        
        return new ViewModel();
    }
    
    public function editarAction(){
        $funcionarios = $this->getEm()->getRepository('Base\Entity\Funcionario')->findAll();
        
        return new ViewModel(array('funcionarios' => $funcionarios));
    }
    
    public function deletarAction(){
        $enviado = false;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Funcionario');
            $dados = $this->getRequest()->getPost()->toArray();
            $entity = $service->delete($dados['id']);
            $enviado = true;
        }
        $funcionarios = $this->getEm()->getRepository('Base\Entity\Funcionario')->findAll();
        
        return new ViewModel(array('funcionarios' => $funcionarios, 'enviado' => $enviado));
    }
    
    public function getEm(){
        if($this->em == null)
            $this->em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        
        return $this->em;
    }
    
    public function insertAction(){
        $valor = 0;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Funcionario');
            $valor = $this->getRequest()->getPost()->toArray();
            $entity  = $service->insert($valor);
            if($entity){
                $valor = 1;
            }
            
        }
        return new JsonModel(array('data'=>array('valor'=>$valor)));
    }
    
    public function editeAction() {
        $valor = 0;
        if($this->getRequest()->isPost()){
            $service = $this->getServiceLocator()->get('Administracao\Service\Funcionario');
            $valor = $this->getRequest()->getPost()->toArray();
            $entity  = $service->update($valor);
            if($entity){
                $valor = 1;
            }
        }
        return new JsonModel(array('data' => array('valor'=>$valor)));
    }
    
    public function populaAction(){
        $funcionarios = '';
        if($this->getRequest()->isPost()){
            $id = $this->getRequest()->getPost()->toArray();
            $funcionario = $this->getEm()->getRepository('Base\Entity\Funcionario')->find($id['id']);
            $funcionarios = $funcionario->toArray();
        }
        
        return new JsonModel(array('data'=>array($funcionarios)));
    }
    
}
