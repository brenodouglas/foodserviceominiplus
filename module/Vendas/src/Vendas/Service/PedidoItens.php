<?php
namespace Vendas\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class PedidoItens extends AbstractService {
    
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity  = 'Base\Entity\PedidoItens';
    }
    
    public function insert(array $dados) {
        $data = array();
        $data['ProdutoPedido'] = $dados['ProdutoPedido'];
        foreach($dados['item'] as $item){
            $data['itens'] = $this->em->getReference('Base\Entity\ProdutoItens',$item);
            $entity = new $this->entity($data);
            $this->em->persist($entity);
        }
        
        $this->em->flush();
        
        return $entity;
    }
}
