<?php
namespace Base\Entity;

use Doctrine\ORM\EntityRepository;

class FuncionarioRepository extends EntityRepository{
   
    public function findByUsuarioAndPassword($username, $password){
       $user = $this->findOneByUsuario($username);
       if($user){
           if($user->getSenha() == $user->encryptPassword($password)){
               return $user;
           } else {
               return false;
           }
       } else {
           return false;
       }
   }
}

