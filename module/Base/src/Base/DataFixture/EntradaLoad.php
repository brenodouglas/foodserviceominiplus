<?php
namespace Base\DataFixturee;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\Entrada;

class EntradaLoad extends AbstractFixture implements OrderedFixtureInterface {
    
    public function getOrder() {
        return 5;
    }

    public function load(ObjectManager $manager) {
        $funcionario = $manager->getReference('Base\Entity\Funcionario',1);
        $entrada = new Entrada();
        $entrada->setFuncionario($funcionario)
                ->setNomePedido('Utilização de sal')
                ->setValor(0.50);
        $manager->persist($entrada);
        $manager->flush();
    }    
}   

