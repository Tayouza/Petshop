<?php

class Conexao{
    public static function abrir(){
        $banco = "petshoptay";
        $local = "localhost";
        $usuario = "root";
        $senha = "password";

        $conn = mysqli_connect($local, $usuario, $senha, $banco);

        if($conn){
            return $conn;
        }else{
            return NULL;
        }
    }

    public static function fechar($conn){
        mysqli_close($conn);
    }

    public static function executar($sql){
        $conn = self::abrir();
        if($conn){
            mysqli_query($conn, $sql);
            self::fechar($conn);
        }
    }

    public static function executarComRetornoId($sql){
        $conn = self::abrir();
        $id = 0;
        if($conn){
            mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            self::fechar($conn);
        }

        return $id;
    }

    public static function consultar($sql){
        $conn = self::abrir();
        if($conn){
            $result = mysqli_query($conn, $sql);
            self::fechar($conn);
            return $result;
        }
        return NULL;
    }
}