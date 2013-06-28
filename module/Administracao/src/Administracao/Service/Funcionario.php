<?php
namespace Administracao\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;
use Base\Service\AbstractService;

class Funcionario extends AbstractService {
   
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Base\Entity\Funcionario';
    }
    
    public function update(array $dados) {
        if(! isset($dados['senha']))
            unset($dados['senha']);
        
        parent::update($dados);
    }
    
}

