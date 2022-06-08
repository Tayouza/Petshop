<?php

include_once '../DAO/CidadeDao.php';
include_once '../DAO/EstadoDao.php';
include_once '../DAO/PaisDao.php';
include_once '../model/CidadeModel.php';
include_once '../model/EstadoModel.php';
include_once '../model/PaisModel.php';

class Cliente
{
    private $id;
    private $nome;
    private $nacionalidade;
    private $cpf;
    private $email;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $cidade;
    private $estado;
    private $pais;

    public function __construct(
        $nome = null,
        $nacionalidade = null,
        $cpf = null,
        $email = null,
        $telefone = null,
        $cep = null,
        $endereco = null,
        $numero = null,
        $complemento = null
    ) {
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
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
     * Get the value of nacionalidade
     */
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * Set the value of nacionalidade
     *
     * @return  self
     */
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of complemento
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */
    public function setCidade($cidade)
    {
        $getCidade = $this->getDadosEFiltrar($cidade, new CidadeDao); //Procura a chave do array correspondente ao pais no banco

        if(!$getCidade){ //se não estiver no banco recebe false e ! pra inverter
            $novaCidade = new Cidade($cidade);
            CidadeDao::inserirSoComNome($novaCidade);
            $getCidade = $this->getDadosEFiltrar($cidade, new CidadeDao);
        }

        $this->cidade = $getCidade->getId();

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $getEstado = $this->getDadosEFiltrar($estado, new EstadoDao); //Procura a chave do array correspondente ao pais no banco

        if(!$getEstado){ //se não estiver no banco recebe false e ! pra inverter
            $novoEstado = new Estado($estado);
            EstadoDao::inserirSoComNome($novoEstado);
            $getEstado = $this->getDadosEFiltrar($estado, new EstadoDao);
        }

        $this->estado = $getEstado->getId();

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
        $getPais = $this->getDadosEFiltrar($pais, new PaisDao); //Procura a chave do array correspondente ao pais no banco

        if(!$getPais){ //se não estiver no banco recebe false e ! pra inverter
            $novoPais = new Pais();
            $novoPais->setNome($pais);
            $novoPais->setSigla(strtoupper(str_split($pais, 2)[0]));
            PaisDao::inserir($novoPais);
            $getPais = $this->getDadosEFiltrar($pais, new PaisDao);
        }

        $this->pais = $getPais->getId();

        return $this;
    }

    public function getDadosEFiltrar($nome, $dao){
        $lista = (array) $dao::buscar();

        $novaLista = [];

        foreach($lista as $chave => $valor){
            $novaLista[$chave] = $valor->getNome();
        }

        $chave = in_array($nome, $novaLista);

        if($chave){
            $chave = array_search($nome, $novaLista);
            return $lista[$chave];
        }else{
            return false;
        }
    }
}
