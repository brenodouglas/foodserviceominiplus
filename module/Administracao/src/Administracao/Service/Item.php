<?php
namespace Administracao\Service;

use Base\Service\AbstractService;
use Zend\Stdlib\Hydrator\ClassMethods;

class Item extends AbstractService{
    
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Base\Entity\ProdutoItens';
    }
    
    public function insert(array $dados){
        $produto = $this->em->getReference('Base\Entity\Produto',$dados['produto']);
        $dados['produto'] = $produto;
        $entity = new $this->entity($dados);
        
        $this->em->persist($entity);
        $this->em->flush();
       
        return $entity; 
    }
    
     public function update(array $dados){
        $entity = $this->em->getReference($this->entity, $dados['id']);
        
        $produto = $this->em->getReference('Base\Entity\Produto',$dados['produto']);
        
        $hydrate = new ClassMethods();
        $hydrate->hydrate($dados, $entity);
        $entity->setProduto($produto);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}

