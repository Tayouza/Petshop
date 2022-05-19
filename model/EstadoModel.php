<?php

class Estado
{
    private $id;
    private $nome;
    private $uf;
    private $pais;

    public function __construct($nome = null, $uf = null, $pais = null)
    {
        $this->nome = $nome;
        $this->uf = $uf;
        $this->pais = $pais;
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
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */

    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */

    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }
}
