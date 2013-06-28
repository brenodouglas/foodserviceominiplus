<?php
namespace Administracao\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Produto extends AbstractService {
    
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Base\Entity\Produto';
    }
    
}

