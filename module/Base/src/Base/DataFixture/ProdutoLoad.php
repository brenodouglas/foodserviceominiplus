<?php
namespace Base\DataFixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\Produto;

class ProdutoLoad extends AbstractFixture implements OrderedFixtureInterface{
    public function getOrder() {
        return 1;
    }

    public function load(ObjectManager $manager) {
        $produto = new Produto();
        $produto->setDataVenc(new \DateTime("now"))
                ->setDescricao('Bombom')
                ->setNome('Bombom garoto')
                ->setQuantidade(20)
                ->setTipo('doce')
                ->setValorCompra(0.5)
                ->setValorVenda(1.50);
        
        $produto2 = new Produto();
        $produto2->setDataVenc(new \DateTime("now"))
                ->setDescricao('Hamburguer com duas carnes')
                ->setNome('Burger New Duplo')
                ->setQuantidade(10)
                ->setTipo('Hamburguer')
                ->setValorCompra(3.0)
                ->setValorVenda(5.50);
        
        $manager->persist($produto);
        $manager->persist($produto2);
        $manager->flush();
    }    
}

