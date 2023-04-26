<?php

class Venda {
    private $id;
    private $dt_hora;
    private $usuario;


    public function __construct($id, $dt_hora, Usuario $usuario){
        $this->id = $id;
        $this->dt_hora = $dt_hora;
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
     * Get the value of dt_hora
     */ 
    public function getDt_hora()
    {
        return $this->dt_hora;
    }

    /**
     * Set the value of dt_hora
     *
     * @return  self
     */ 
    public function setDt_hora($dt_hora)
    {
        $this->dt_hora = $dt_hora;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}

