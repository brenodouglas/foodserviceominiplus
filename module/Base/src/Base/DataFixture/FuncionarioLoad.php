<?php
namespace Base\DataFixturee;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\Entity\Funcionario;

class FuncionarioLoad extends AbstractFixture implements OrderedFixtureInterface {
   
    public function getOrder() {
        return 4;
    }

    public function load(ObjectManager $manager) {
        $funcionario = new Funcionario();
        $funcionario->setNome("Breno Douglas")
                    ->setUsuario('bdouglas')
                    ->setSenha('123')
                    ->setPermissao('funcionario')
                    ->setIsAdmin(false)
                    ->setCargo('Funcionário');
        
        $manager->persist($funcionario);
        $manager->flush();
    }  
}

