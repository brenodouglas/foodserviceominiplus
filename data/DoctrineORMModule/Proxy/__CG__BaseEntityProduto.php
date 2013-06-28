<?php

namespace DoctrineORMModule\Proxy\__CG__\Base\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Produto extends \Base\Entity\Produto implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'nome', 'descricao', 'tipo', 'valorCompra', 'item', 'valorVenda', 'quantidade', 'dataVenc', 'produtoItens');
        }

        return array('__isInitialized__', 'id', 'nome', 'descricao', 'tipo', 'valorCompra', 'item', 'valorVenda', 'quantidade', 'dataVenc', 'produtoItens');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Produto $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNome', array());

        return parent::getNome();
    }

    /**
     * {@inheritDoc}
     */
    public function setNome($nome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNome', array($nome));

        return parent::setNome($nome);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescricao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescricao', array());

        return parent::getDescricao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescricao($descricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescricao', array($descricao));

        return parent::setDescricao($descricao);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipo', array());

        return parent::getTipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipo($tipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipo', array($tipo));

        return parent::setTipo($tipo);
    }

    /**
     * {@inheritDoc}
     */
    public function getValorCompra()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValorCompra', array());

        return parent::getValorCompra();
    }

    /**
     * {@inheritDoc}
     */
    public function setValorCompra($valorCompra)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setValorCompra', array($valorCompra));

        return parent::setValorCompra($valorCompra);
    }

    /**
     * {@inheritDoc}
     */
    public function getValorVenda()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValorVenda', array());

        return parent::getValorVenda();
    }

    /**
     * {@inheritDoc}
     */
    public function setValorVenda($valorVenda)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setValorVenda', array($valorVenda));

        return parent::setValorVenda($valorVenda);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuantidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuantidade', array());

        return parent::getQuantidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuantidade($quantidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuantidade', array($quantidade));

        return parent::setQuantidade($quantidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getDataVenc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDataVenc', array());

        return parent::getDataVenc();
    }

    /**
     * {@inheritDoc}
     */
    public function setDataVenc($dataVenc)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDataVenc', array($dataVenc));

        return parent::setDataVenc($dataVenc);
    }

    /**
     * {@inheritDoc}
     */
    public function getItens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getItens', array());

        return parent::getItens();
    }

    /**
     * {@inheritDoc}
     */
    public function getItem()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getItem', array());

        return parent::getItem();
    }

    /**
     * {@inheritDoc}
     */
    public function setItem($item)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setItem', array($item));

        return parent::setItem($item);
    }

    /**
     * {@inheritDoc}
     */
    public function getProdutoItens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProdutoItens', array());

        return parent::getProdutoItens();
    }

    /**
     * {@inheritDoc}
     */
    public function setProdutoItens($produtoItens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProdutoItens', array($produtoItens));

        return parent::setProdutoItens($produtoItens);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array());

        return parent::toArray();
    }

}