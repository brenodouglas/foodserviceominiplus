<?php
namespace Vendas\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Cliente extends AbstractService {
    
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "Base\Entity\Cliente";
    }
}
