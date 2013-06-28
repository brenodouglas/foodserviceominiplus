<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * AclPrivileges
 *
 * @ORM\Table(name="acl_privileges")
 * @ORM\Entity
 */
class AclPrivileges
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var \Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_id", referencedColumnName="id")
     * })
     */
    private $funcionario;

    /**
     * @var \AclResources
     *
     * @ORM\ManyToOne(targetEntity="AclResources")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resources_id", referencedColumnName="id")
     * })
     */
    private $resources;
    
    public function __construct(Array $dados = array()) {
        $hydrate = new ClassMethods();
        $hydrate->hydrate($dados, $this);
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function setData(\DateTime $data) {
        $this->data = $data;
        return $this;
    }

    public function getFuncionario() {
        return $this->funcionario;
    }

    public function setFuncionario(Funcionario $funcionario) {
        $this->funcionario = $funcionario;
        return $this;
    }

    public function getResources() {
        return $this->resources;
    }

    public function setResources(AclResources $resources) {
        $this->resources = $resources;
        return $this;
    }

}
