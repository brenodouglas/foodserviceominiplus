<?php
namespace Base\Entity;

use Doctrine\ORM\EntityRepository;

class ProdutoRepository extends EntityRepository{
    
    public function fetchPairs(){
        $dados = $this->findAll();
        $array = '';
        foreach($dados as $data){
            $array['nome'] = $data->getNome();
            $array['id']   = $data->getId();
        }
        
        return $array;
    }
}

