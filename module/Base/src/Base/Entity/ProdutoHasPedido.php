<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProdutoHasPedido
 *
 * @ORM\Table(name="produto_has_pedido")
 * @ORM\Entity
 */
class ProdutoHasPedido
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
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

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
     * @var \Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     * })
     */
    private $produto;

    /**
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido",inversedBy="produtoHasPedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     * })
     */
    private $pedido;

    /**
    *
    * @ORM\OneToMany(targetEntity="PedidoItens", mappedBy="produtoPedido")
    */
    private $produtoItens;
    
    public function __construct(Array $dados = array()) {
        $hydrate = new ClassMethods();
        $hydrate->hydrate($dados, $this);
        $this->setData(new \DateTime("now"));
        $this->produtoItens = new ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
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

    public function setData(\DateTime $data) {
        $this->data = $data;
        return $this;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function setProduto(Produto $produto) {
        $this->produto = $produto;
        return $this;
    }

    public function getPedido() {
        return $this->pedido;
    }

    public function setPedido(Pedido $pedido) {
        $this->pedido = $pedido;
        return $this;
    }
    
    public function getProdutoItens() {
        return $this->produtoItens;
    }

    public function setProdutoItens($produtoItens) {
        $this->produtoItens = $produtoItens;
    }


}
