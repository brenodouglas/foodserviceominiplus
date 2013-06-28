<?php
namespace Vendas\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Pedido extends AbstractService {
    
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Base\Entity\Pedido';
    }
    
    public function insert(array $dados) {
        $dados['funcionario'] = $this->em->getReference('Base\Entity\Funcionario',$dados['funcionario']);
        parent::insert($dados);
    }
    
    public function updateConcluido(array $dados) {
        $entity = $this->em->getReference($this->entity, $dados['id']);
        $entity->setConcluido(true);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}

