<?php
namespace Vendas\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class ProdutoHasPedido extends AbstractService {
    
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Base\Entity\ProdutoHasPedido';
    }
    
    public function insert(array $dados) {
        $dados['produto'] = $this->em->getReference('Base\Entity\Produto',$dados['produto']);
        $dados['pedido'] = $this->em->getReference('Base\Entity\Pedido', $dados['pedido']);
        
        $entity = new $this->entity($dados);
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}

