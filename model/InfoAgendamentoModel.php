<?php

class InfoAgendamento
{
    private $nomeTutor;
    private $nomePet;
    private $hora;

    public function __construct($nomeTutor = NULL, $nomePet = NULL, $hora = NULL){
        $this->nomeTutor = $nomeTutor;
        $this->nomePet = $nomePet;
        $this->hora = $hora;
    }

    /**
     * Get the value of nomeTutor
     */ 
    public function getNomeTutor()
    {
        return $this->nomeTutor;
    }

    /**
     * Set the value of nomeTutor
     *
     * @return  self
     */ 
    public function setNomeTutor($nomeTutor)
    {
        $this->nomeTutor = $nomeTutor;

        return $this;
    }

    /**
     * Get the value of nomePet
     */ 
    public function getNomePet()
    {
        return $this->nomePet;
    }

    /**
     * Set the value of nomePet
     *
     * @return  self
     */ 
    public function setNomePet($nomePet)
    {
        $this->nomePet = $nomePet;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }
}
