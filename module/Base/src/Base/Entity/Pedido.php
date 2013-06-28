<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity(repositoryClass="Base\Entity\PedidoRepository")
 */
class Pedido
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
     * @ORM\Column(name="senha", type="string", length=45, nullable=false)
     */
    private $senha;

    /**
    *
    * @ORM\Column(name="concluido", type="boolean", nullable=true)
    */
    private $concluido;
    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

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
     *
     * @var type 
     * @ORM\OneToMany(targetEntity="Base\Entity\ProdutoHasPedido", mappedBy="pedido")
     */
    private $produtoHasPedido;
    
    public function __construct(Array $dados = array()) {
        $hydrate = new ClassMethods();
        $hydrate->hydrate($dados, $this);
        $this->concluido = false;
        $this->produtoHasPedido = new ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    public function getConlcuido(){
        return $this->concluido;
    }

    public function setConcluido($concluido){
        $this->concluido = $concluido;
        return $this;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
        return $this;
    }

    public function getFuncionario() {
        return $this->funcionario;
    }

    public function setFuncionario(Funcionario $funcionario) {
        $this->funcionario = $funcionario;
        return $this;
    }

    public function getProdutoHasPedido() {
        return $this->produtoHasPedido;
    }

    public function setProdutoHasPedido($produtoHasPedido) {
        $this->produtoHasPedido = $produtoHasPedido;
    }

}
