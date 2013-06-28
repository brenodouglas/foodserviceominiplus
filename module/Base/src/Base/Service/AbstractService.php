<?php
namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService {
    
    protected $em;
    protected $entity;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function insert(array $dados){
        $entity = new $this->entity($dados);
        
        $this->em->persist($entity);
        $this->em->flush();
       
        return $entity; 
    }
    
    public function update(array $dados){
        $entity = $this->em->getReference($this->entity, $dados['id']);
        $hydrate = new ClassMethods();
        $hydrate->hydrate($dados, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
    
    public function delete($id){
        $entity = $this->em->getReference($this->entity, $id);
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
        }
    }
}

