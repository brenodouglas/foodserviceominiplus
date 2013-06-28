<?php
namespace Base\DataFixturee;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\Pedido;

class PedidoLoad extends AbstractFixture implements OrderedFixtureInterface {
    public function getOrder() {
        return 7;
    }

    public function load(ObjectManager $manager) {
        $cliente = $manager->getReference('Base\Entity\Cliente',1);
        $funcionario = $manager->getReference('Base\Entity\Funcionario',1);
        
        $pedido = new Pedido();
        $pedido->setCliente($cliente)
               ->setFuncionario($funcionario)
               ->setSenha('21');
        
        $manager->persist($pedido);
        $manager->flush();
    }    
}
