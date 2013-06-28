<?php
namespace Login\Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class AuthAdapter implements AdapterInterface {
    
    private $username;
    private $password;
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
        
    public function authenticate() {
        $repo = $this->em->getRepository('Base\Entity\Funcionario');
        $user = $repo->findByUsuarioAndPassword($this->getUsername(),$this->getPassword());
        if($user){
           return new Result(Result::SUCCESS,array('user' => $user),array('ok')); 
        } else {
            return new Result(Result::FAILURE, null, array());
        }
    }
}
