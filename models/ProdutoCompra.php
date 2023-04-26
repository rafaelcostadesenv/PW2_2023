<?php



class ProdutoCompra {
    private $qtd;
    private $preco_custo;
    private $produto;
    private $compra;

    public function __construct($qtd, $preco_custo, Produto $produto, Compra $compra){
        $this->qtd = $qtd;
        $this->preco_custo = $preco_custo;
        $this->produto = $produto;
        $this->compra = $compra;
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
     * Get the value of preco_custo
     */ 
    public function getPreco_custo()
    {
        return $this->preco_custo;
    }

    /**
     * Set the value of preco_custo
     *
     * @return  self
     */ 
    public function setPreco_custo($preco_custo)
    {
        $this->preco_custo = $preco_custo;

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
}

