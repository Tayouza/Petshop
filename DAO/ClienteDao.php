<?php
include_once "../DAO/Conexao.php";
include_once "../model/ClienteModel.php";

class ClienteDao
{
    public static function inserir($cliente)
    {
        $sql = "INSERT INTO cliente(nome, 
                            nacionalidade, 
                            cpf, 
                            email, 
                            telefone, 
                            cep, 
                            endereco,
                            numero,
                            complemento,
                            id_cidade,
                            id_estado,
                            id_pais)
                VALUES ('{$cliente->getNome()}',
                        '{$cliente->getNacionalidade()}',
                        '{$cliente->getCpf()}',
                        '{$cliente->getEmail()}',
                        '{$cliente->getTelefone()}',
                        '{$cliente->getCep()}',
                        '{$cliente->getEndereco()}',
                        '{$cliente->getNumero()}',
                        '{$cliente->getComplemento()}',
                        '{$cliente->getCidadeId()}',
                        '{$cliente->getEstadoId()}',
                        '{$cliente->getPaisId()}'
                        )";

        Conexao::executar($sql);
    }

    public static function buscar()
    {
        $sql = "SELECT cli.*, cid.nome AS nome_cidade,
                es.nome AS nome_estado, 
                pais.nome AS nome_pais FROM cliente AS cli 
                INNER JOIN cidade AS cid ON cid.id = cli.id_cidade 
                INNER JOIN estado AS es ON es.id = cli.id_estado 
                INNER JOIN pais ON pais.id = cli.id_pais;";

        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (
                list(
                    $_id,
                    $_nome,
                    $_nacionalidade,
                    $_cpf,
                    $_email,
                    $_telefone,
                    $_cep,
                    $_endereco,
                    $_numero,
                    $_complemento,
                    $_idCidade,
                    $_idEstado,
                    $_idPais,
                    $_cidade,
                    $_estado,
                    $_pais
                )
                =
                mysqli_fetch_row($result)
            ) {
                $cliente = new Cliente();
                $cliente->setId($_id);
                $cliente->setNome($_nome);
                $cliente->setNacionalidade($_nacionalidade);
                $cliente->setCpf($_cpf);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setCep($_cep);
                $cliente->setEndereco($_endereco);
                $cliente->setNumero($_numero);
                $cliente->setComplemento($_complemento);
                $cliente->setCidade($_cidade);
                $cliente->setEstado($_estado);
                $cliente->setPais($_pais);
                $lista->append($cliente);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id)
    {
        $sql = "SELECT cli.*, cid.nome AS nome_cidade,
                es.nome AS nome_estado, 
                pais.nome AS nome_pais FROM cliente AS cli  
                INNER JOIN cidade AS cid ON cid.id = cli.id_cidade 
                INNER JOIN estado AS es ON es.id = cli.id_estado 
                INNER JOIN pais ON pais.id = cli.id_pais
                WHERE cli.id = {$id};";

        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (
                list(
                    $_id,
                    $_nome,
                    $_nacionalidade,
                    $_cpf,
                    $_email,
                    $_telefone,
                    $_cep,
                    $_endereco,
                    $_numero,
                    $_complemento,
                    $_idCidade,
                    $_idEstado,
                    $_idPais,
                    $_cidade,
                    $_estado,
                    $_pais
                )
                =
                mysqli_fetch_row($result)
            ) {
                $cliente = new Cliente();
                $cliente->setId($_id);
                $cliente->setNome($_nome);
                $cliente->setNacionalidade($_nacionalidade);
                $cliente->setCpf($_cpf);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setCep($_cep);
                $cliente->setEndereco($_endereco);
                $cliente->setNumero($_numero);
                $cliente->setComplemento($_complemento);
                $cliente->setCidade($_cidade);
                $cliente->setEstado($_estado);
                $cliente->setPais($_pais);
            }
        }
        return $cliente;
    }

    public static function buscarPorCpf($cpf)
    {
        $sql = "SELECT * FROM cliente WHERE cpf = '{$cpf}';";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (
                list(
                    $_id,
                    $_nome,
                    $_nacionalidade,
                    $_cpf,
                    $_email,
                    $_telefone,
                    $_cep,
                    $_endereco,
                    $_numero,
                    $_complemento,
                    $_idCidade,
                    $_idEstado,
                    $_idPais,
                )
                =
                mysqli_fetch_row($result)
            ) {
                $cliente = new Cliente();
                $cliente->setId($_id);
                $cliente->setNome($_nome);
                $cliente->setNacionalidade($_nacionalidade);
                $cliente->setCpf($_cpf);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setCep($_cep);
                $cliente->setEndereco($_endereco);
                $cliente->setNumero($_numero);
                $cliente->setComplemento($_complemento);
                $cliente->setCidade($_idCidade);
                $cliente->setEstado($_idEstado);
                $cliente->setPais($_idPais);
                $lista->append($cliente);
            }
        }
        return $lista;
    }

    public static function editar($cliente)
    {
        $sql = "UPDATE cliente SET 
                nome = '{$cliente->getNome()}',
                nacionalidade = '{$cliente->getNacionalidade()}',
                cpf = '{$cliente->getCpf()}',
                email = '{$cliente->getEmail()}',
                telefone = '{$cliente->getTelefone()}',
                cep = '{$cliente->getCep()}',
                endereco = '{$cliente->getEndereco()}',
                complemento = '{$cliente->getComplemento()}',
                id_cidade = '{$cliente->getCidadeId()}',
                id_estado = '{$cliente->getEstadoId()}', 
                id_pais = '{$cliente->getPaisId()}' 
                WHERE id = {$cliente->getId()}";
        Conexao::executar($sql);
    }

    public static function excluir($id)
    {
        $sql = "DELETE FROM cliente WHERE cliente.id = {$id}";
        Conexao::executar($sql);
    }
}
