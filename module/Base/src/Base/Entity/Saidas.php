<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Saidas
 *
 * @ORM\Table(name="saidas")
 * @ORM\Entity
 */
class Saidas
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
     * @ORM\Column(name="nome_pedido", type="string", length=45, nullable=false)
     */
    private $nomePedido;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", nullable=false)
     */
    private $valor;

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

    public function __construct(Array $dados = array()) {
        $hydrate = new ClassMethods();
        $hydrate->hydrate($dados, $this);
        $this->data = new \DateTime("now");
    }
    
    public function getNomePedido() {
        return $this->nomePedido;
    }

    public function setNomePedido($nomePedido) {
        $this->nomePedido = $nomePedido;
        return $this;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function getFuncionario() {
        return $this->funcionario;
    }

    public function setFuncionario(Funcionario $funcionario) {
        $this->funcionario = $funcionario;
        return $this;
    }
    
}
