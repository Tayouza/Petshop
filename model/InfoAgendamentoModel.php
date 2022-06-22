<?php

class InfoAgendamento
{
    private $nomeTutor;
    private $nomePet;
    private $data;
    private $hora;

    public function __construct($nomeTutor = NULL, $nomePet = NULL, $data = NULL, $hora = NULL){
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

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        date_default_timezone_set('America/Sao_Paulo');

        if(!empty($data)){
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $data = strftime('%d de %B de %Y', strtotime($data));
            $this->data = $data;
        }else{
            $this->data = null;
        }
        
        return $this;
    }
}
