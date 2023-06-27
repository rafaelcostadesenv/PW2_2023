<?php
require_once "models\Produto.php";
require_once "models\Venda.php";

class ProdutoVenda
{
    private $id;

    private $valor_unitario;

    private $qtde;

    private $produto;

    private $venda;

    private $usuario;

    public function __construct($id, $valor_unitario, $qtde, Produto $produto, Venda $venda, Usuario $usuario)
    {
        $this->id = $id;
        $this->valor_unitario = $valor_unitario;
        $this->qtde = $qtde;
        $this->produto = $produto;
        $this->venda = $venda;
        $this->usuario = $usuario;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of produto
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Set the value of produto
     *
     * @return  self
     */
    public function setProduto(Produto $produto)
    {
        $this->produto = $produto;

        return $this;
    }

    /**
     * Get the value of venda
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * Set the value of venda
     *
     * @return  self
     */
    public function setVenda(Venda $venda)
    {
        $this->venda = $venda;

        return $this;
    }

    /**
     * Get the value of valor_unitario
     */
    

    /**
     * Get the value of qtde
     */
    public function getQtde()
    {
        return $this->qtde;
    }

    /**
     * Set the value of qtde
     *
     * @return  self
     */
    public function setQtde($qtde)
    {
        $this->qtde = $qtde;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuairo()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuairo(Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getValor_unitario() {
		return $this->valor_unitario;
	}
	
	/**
	 * @param mixed $valor_unitario 
	 * @return self
	 */
	public function setValor_unitario($valor_unitario): self {
		$this->valor_unitario = $valor_unitario;
		return $this;
	}
}
