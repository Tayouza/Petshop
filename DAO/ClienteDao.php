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
                        '{$cliente->getCidade()}',
                        '{$cliente->getEstado()}',
                        '{$cliente->getPais()}'
                        )";

        Conexao::executar($sql);
    }

    public static function buscar()
    {
        $sql = "SELECT * FROM cliente";
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
                    $_cidade,
                    $_estado,
                    $_pais
                )
                =
                mysqli_fetch_row($result)
            ) {
                $cidade = new Cliente();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
                $cidade->setNacionalidade($_nacionalidade);
                $cidade->setCpf($_cpf);
                $cidade->setEmail($_email);
                $cidade->setTelefone($_telefone);
                $cidade->setCep($_cep);
                $cidade->setEndereco($_endereco);
                $cidade->setNumero($_numero);
                $cidade->setComplemento($_complemento);
                $cidade->setCidade($_cidade);
                $cidade->setEstado($_estado);
                $cidade->setPais($_pais);
                $lista->append($cidade);
            }
        }
        return $lista;
    }

    public static function buscarId($id)
    {
        $sql = "SELECT id, nome, id_estado, id_pais FROM cidade WHERE id = {$id}";
        $result = Conexao::consultar($sql);
        if ($result != null) {
            list($_id, $_nome, $_estado, $_pais) = mysqli_fetch_row($result);
            $cidade = new cidade();
            $cidade->setId($_id);
            $cidade->setNome($_nome);
            $cidade->setEstado($_estado);
            $cidade->setPais($_pais);
        }
        return $cidade;
    }

    public static function editar($cidade)
    {
        $sql = "UPDATE cidade SET 
                nome = '{$cidade->getNome()}', 
                id_estado = '{$cidade->getEstado()}', 
                id_pais = '{$cidade->getPais()}' 
                WHERE id = {$cidade->getId()}";
        Conexao::executar($sql);
    }

    public static function excluir($id)
    {
        $sql = "DELETE FROM cidade WHERE cidade.id = {$id}";
        Conexao::executar($sql);
    }
}
