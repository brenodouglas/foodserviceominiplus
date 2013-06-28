<?php
namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * PedidoItens
 *
 * @ORM\Table(name="produto_pedido_itens")
 * @ORM\Entity
 */
class PedidoItens
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
     *
     * @var type 
     * @ORM\ManyToOne(targetEntity="ProdutoItens")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="produto_itens_id",referencedColumnName="id")
     * })
     */
    private $itens;
    
    /**
     *
     * @var type 
     * @ORM\ManyToOne(targetEntity="ProdutoHasPedido",inversedBy="produtoItens")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="produto_pedido_id", referencedColumnName="id")
     * })
     */
    private $produtoPedido;


    public function __construct(Array $dados = array()) {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($dados, $this);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getItens() {
        return $this->itens;
    }

    public function setItens($itens) {
        $this->itens = $itens;
    }

    public function getProdutoPedido() {
        return $this->produtoPedido;
    }

    public function setProdutoPedido($produtoPedido) {
        $this->produtoPedido = $produtoPedido;
    }


}
