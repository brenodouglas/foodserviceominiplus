<?php
namespace Base\DataFixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\ProdutoItens;

class ProdutoItensLoad extends AbstractFixture implements OrderedFixtureInterface{
    public function getOrder() {
        return 2;
    }

    public function load(ObjectManager $manager) {
        $produto = $manager->getReference('Base\Entity\Produto',1);
        $produto2 = $manager->getReference('Base\Entity\Produto',2);
        $itens = new ProdutoItens();
        $itens->setProduto($produto)
              ->setDescricao('Carne de Hamburguer')
              ->setValor(0.50);
        
        $itens2 = new ProdutoItens();
        $itens2->setProduto($produto)
               ->setDescricao('Pão')
               ->setValor(0.80);
        
        $itens3 = new ProdutoItens();
        $itens3->setProduto($produto2)
               ->setDescricao('Pão')
               ->setValor(0.50);
        
        $itens4 = new ProdutoItens();
        $itens4->setProduto($produto2)
               ->setDescricao('Hamburguer')
               ->setValor(1.80);
        
        $manager->persist($itens);
        $manager->persist($itens2);
        $manager->persist($itens3);
        $manager->persist($itens4);
        $manager->flush();
    }   
}


