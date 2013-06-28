<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity(repositoryClass="Base\Entity\ProdutoRepository")
 */
class Produto
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
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=45, nullable=false)
     */
    private $tipo;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_compra", type="float", nullable=true)
     */
    private $valorCompra;
    
    /**
     *
     * @var type 
     * @ORM\Column(name="itens", type="boolean")
     */
    private $item;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_venda", type="float", nullable=false)
     */
    private $valorVenda;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=false)
     */
    private $quantidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_venc", type="date", nullable=false)
     */
    private $dataVenc;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="Base\Entity\ProdutoItens", mappedBy="produto")
     */
    private $produtoItens;
    
    
    public function __construct(Array $dados = array()) {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($dados, $this);
        
        $this->produtoItens = new ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    public function getValorCompra() {
        return $this->valorCompra;
    }

    public function setValorCompra($valorCompra) {
        $this->valorCompra = $valorCompra;
        return $this;
    }

    public function getValorVenda() {
        return $this->valorVenda;
    }

    public function setValorVenda($valorVenda) {
        $this->valorVenda = $valorVenda;
        return $this;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getDataVenc() {
        return $this->dataVenc;
    }

    public function setDataVenc($dataVenc) {
        $this->dataVenc = \DateTime::createFromFormat('d-m-Y', $dataVenc);
        return $this;
    }
    
    public function getItens(){
        return $this->produtoItens;
    }
    
    public function getItem() {
        return $this->item;
    }

    public function setItem($item) {
        $this->item = $item;
    }
    
    public function getProdutoItens() {
        return $this->produtoItens;
    }

    public function setProdutoItens($produtoItens) {
        $this->produtoItens = $produtoItens;
    }
        
    public function toArray() {
        return (new ClassMethods())->extract($this);
    }
}
