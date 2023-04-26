<?php



class ProdutoVenda {
    private $qtd;
    private $valor_unitario;
    private $valor_total;
    private $venda;
    private $compra;
    private $produto;

    public function __construct($qtd, $valor_unitario, $valor_total, Venda $venda, Compra $compra, Produto $produto){
        $this->qtd = $qtd;
        $this->valor_unitario = $valor_unitario;
        $this->valor_total = $valor_total;
        $this->venda = $venda;
        $this->compra = $compra;
        $this->produto = $produto;
    }

    

    /**
     * Get the value of qtd
     */ 
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * Set the value of qtd
     *
     * @return  self
     */ 
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;

        return $this;
    }

    /**
     * Get the value of valor_unitario
     */ 
    public function getValor_unitario()
    {
        return $this->valor_unitario;
    }

    /**
     * Set the value of valor_unitario
     *
     * @return  self
     */ 
    public function setValor_unitario($valor_unitario)
    {
        $this->valor_unitario = $valor_unitario;

        return $this;
    }

    /**
     * Get the value of valor_total
     */ 
    public function getValor_total()
    {
        return $this->valor_total;
    }

    /**
     * Set the value of valor_total
     *
     * @return  self
     */ 
    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;

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
     * Get the value of compra
     */ 
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * Set the value of compra
     *
     * @return  self
     */ 
    public function setCompra(Compra $compra)
    {
        $this->compra = $compra;

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
    public function setProduto( Produto $produto)
    {
        $this->produto = $produto;

        return $this;
    }
}

