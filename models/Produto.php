<?php

class Produto {
    private $id;
    private $nome;
    private $valor;
    private $descricao;
    private $imagem;

    public function __construct($id, $nome, $valor, $descricao, $imagem){
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }
   
    public function getid()
    {
        return $this->id;
    }

    public function setid($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }
}

