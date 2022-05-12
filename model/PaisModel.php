<?php

class Pais
{
    private $id;
    private $nome;
    private $sigla;

    public function __construct($nome = NULL, $sigla = NULL){
        $this->nome = $nome;
        $this->sigla = $sigla;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
        
        return $this;
    }
    
    public function getSigla(){
        return $this->sigla;
    }

    public function setSigla($sigla){
        $this->sigla = $sigla;

        return $this;
    }
}
