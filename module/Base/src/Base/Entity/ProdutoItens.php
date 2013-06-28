<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;
/**
 * ProdutoItens
 * 
 * @ORM\Table(name="produto_itens")
 * @ORM\Entity(repositoryClass="Base\Entity\ProdutoItensRepository")
 */
class ProdutoItens
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
     * @ORM\Column(name="descricao", type="text", nullable=false)
     */
    private $descricao;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", nullable=false)
     */
    private $valor;

    /**
     * @var \Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto", inversedBy="produtoItens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     * })
     */
    private $produto;
    
    public function __construct(Array $dados = array()) {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($dados, $this);
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

    public function getProduto() {
        return $this->produto;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
        return $this;
    }
    
    public function toArray(){
        return (new ClassMethods())->extract($this);
    }
}
