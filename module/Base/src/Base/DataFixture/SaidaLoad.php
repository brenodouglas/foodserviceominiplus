<?php
namespace Base\DataFixturee;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\Saidas;

class SaidaLoad extends AbstractFixture implements OrderedFixtureInterface {
    public function getOrder() {
        return 6;
    }

    public function load(ObjectManager $manager) {
        $funcionario = $manager->getReference('Base\Entity\Funcionario', 1);
        $saidas = new Saidas();
        $saidas->setFuncionario($funcionario)
               ->setNomePedido('Material para banheiro')
               ->setValor(2.20);
        $manager->persist($saidas);
        $manager->flush();
    }    
}

