<?php
namespace Base\DataFixturee;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\ProdutoHasPedido;

class ProdutoHasPedidoLoad extends AbstractFixture implements OrderedFixtureInterface {
    public function getOrder() {
        return 8;
    }

    public function load(ObjectManager $manager) {
        $produto = $manager->getReference('Base\Entity\Produto',1);
        $pedido  = $manager->getReference('Base\Entity\Pedido',1);
        
        $produtoHasPedido = new ProdutoHasPedido();
        $produtoHasPedido->setPedido($pedido)
                         ->setProduto($produto)
                         ->setValor($produto->getValorVenda())
                         ->setData(new \DateTime("now"))
                         ->setDescricao('Obs, apenas para teste');
        
        $manager->persist($produtoHasPedido);
        $manager->flush();
    }    
}
