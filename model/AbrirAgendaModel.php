<?php

class AbrirAgenda
{
    private $id;
    private $data;
    private $dataFormatada;
    private $hora;
    private $ativo;

    public function __construct($data = NULL, $hora = NULL)
    {
        $this->setDataFormatada($data);
        $this->data = $data;
        $this->hora = $hora;
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
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getDataFormatada()
    {
        return $this->dataFormatada;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setDataFormatada($data)
    {
        date_default_timezone_set('America/Sao_Paulo');

        if(!empty($data)){
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $dataFormatada = strftime('%d de %B de %Y', strtotime($data));
            $this->dataFormatada = $dataFormatada;
        }else{
            $this->dataFormatada = null;
        }
        
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
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }
}
