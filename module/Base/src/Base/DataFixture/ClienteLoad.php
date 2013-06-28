<?php
namespace Base\DataFixturee;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\Cliente;

class ClienteLoad extends AbstractFixture implements OrderedFixtureInterface {
  
    public function getOrder() {
        return 3;
    }

    public function load(ObjectManager $manager) {
        $cliente = new Cliente();
        $cliente->setNome('Breno Douglas Araújo Souza')
                ->setObs('Come sempre Burger New Triplo');   
                
        $manager->persist($cliente);
        $manager->flush();
    }   
}

