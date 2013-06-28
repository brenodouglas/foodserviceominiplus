<?php
namespace Base\Entity;

use Doctrine\ORM\EntityRepository;

class PedidoRepository extends EntityRepository{
    
    public function last(){
        $query = $this->createQueryBuilder("Base\Entity\Pedido")->select("p")->from("Base\Entity\Pedido", "p")->orderBy("p.id","DESC")->setMaxResults(1);
        $array = $query->getQuery()->getArrayResult();
        foreach($array as $dados){
            $id = $dados['id'];
        }
        return $id;
    }
}

