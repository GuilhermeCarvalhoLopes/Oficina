<?php
// constante para conexao com o php

define("server", "mysql:host=localhost;dbname=mecanica");
define('user', 'root');
define('senha', '');

/**
 *
 */
class mecanica
{
    public $id;
    public $cliente;
    public $data;
    public $vendedor;
    public $descricao;
    public $valor;

    // funcao para lista os dados do banco
    public function listarAll()
    {
        //criar a conexao com o banco de dados
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // criar o comando sql
        $smtp = $pdo->prepare("select * from loja_mecanica");

        // executar no banco
        $smtp->execute();

        // verificar se retornou dados
        if ($smtp->rowCount() > 0) {

            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function pesquisa()
    {
        //criar a conexao com o banco de dados
        if (isset($_GET["cliente"])) {
            $this->CLIENTE = $_GET["cliente"];

            $pdo = new PDO(server, user, senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // criar o comando sql
            $smtp = $pdo->prepare("select * from loja_mecanica where cliente = :cliente");

            // executar no banco
            $smtp->execute(array(
                ':cliente' => $_GET["cliente"]
            ));

            // verificar se retornou dados
            if ($smtp->rowCount() > 0) {

                return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
            }
        }
    }

    // funcao para inserir cargos
    public function inserir()
    {
        if (isset($_GET["cliente"]) && isset($_GET["data"]) && isset($_GET["vendedor"]) && isset($_GET["descricao"]) && isset($_GET["valor"])) {
            //preenche os atributos com os  valores do formulario
            $this->CLIENTE = $_GET["cliente"];
            $this->DATA = $_GET["data"];
            $this->VENDEDOR = $_GET["vendedor"];
            $this->DESCRICAO = $_GET["descricao"];
            $this->VALOR = $_GET["valor"];


            // criar a conexao com o banco de dados
            $pdo = new PDO(server, user, senha);
            // criar o comando sql
            $smtp = $pdo->prepare("insert into loja_mecanica values(:id,:cliente,:data, :vendedor,  :descricao, :valor_orcado)");

            // executar no banco passando os valores recebidos como parametros
            $smtp->execute(array(
                ':id' => Null,
                ':cliente' => $this->CLIENTE,
                ':data' => $this->DATA,
                ':vendedor' => $this->VENDEDOR,
                ':descricao' => $this->DESCRICAO,
                ':valor_orcado' => $this->VALOR
            ));

            // verificar se retornou dados
            if ($smtp->rowCount() > 0) {

                //volta para index
                header("location: index.php");
            }

        } else {
            //volta para index
            header("location:./");
        }
    }


    // função para alterar cargos
    public function alterar()
    {
        if (isset($_GET["id"]) && isset($_GET["cliente"]) && isset($_GET["data"]) && isset($_GET["vendedor"]) && isset($_GET["descricao"]) && isset($_GET["valor"])) {

            //preenche os atributos com os  valores do formulario
            $this->ID = $_GET["id"];
            $this->CLIENTE = $_POST["cliente"];
            $this->DATA = $_GET["data"];
            $this->VENDEDOR = $_GET["vendedor"];
            $this->DESCRICAO = $_GET["descricao"];
            $this->VALOR = $_GET["valor"];

            // criar a conexao com o banco de dados
            $pdo = new PDO(server, user, senha);
            // criar o comando sql
            $smtp = $pdo->prepare("update loja_mecanica set cliente = :cliente,data = :data, vendedor = :vendedor,
                                                                                    descricao = :descricao, valor = :valor where id = :id");

            // executar no banco passando os valores recebidos como parametros
            $smtp->execute(array(
                ':id' => $this->ID,
                ':cliente' => $this->CLIENTE,
                ':data' => $this->DATA,
                ':vendedor' => $this->VENDEDOR,
                ':descricao' => $this->DESCRICAO,
                ':valor_orcado' => $this->VALOR
            ));

            // verificar se retornou dados
            if ($smtp->rowCount() > 0) {
                //volta para index
                header("location:./");
            }
        } else {
            //volta para index
            header("location:./");
        }
    }

    // funcao para lista os dados do banco
    public function listarCodigo($id)
    {

        // verificar se recebeu o codigo como parametro
        if (isset($id)) {
            //preenche os atributos com os  valores do formulario
            $this->ID = $id;
            //criar a conexao com o banco de dados
            $pdo = new PDO(server, user, senha);

            // criar o comando sql
            $smtp = $pdo->prepare("select * from loja_mecanica where id = :id");

            // executar no banco passando o codigo como parametro
            $smtp->execute(array(
                ':id' => $this->ID
            ));

            // verificar se retornou dados
            if ($smtp->rowCount() > 0) {

                return $result = $smtp->fetchObject();
            }
        }

    }

    // funcao para lista os dados do banco
    public function excluir($id)
    {

        // verificar se recebeu o codigo como parametro
        if (isset($id)) {
            //preenche os atributos com os  valores do formulario
            $this->ID = $id;
            //criar a conexao com o banco de dados
            $pdo = new PDO(server, user, senha);

            // criar o comando sql
            $smtp = $pdo->prepare("delete from loja_mecanica where id = :id");

            // executar no banco passando o codigo como parametro
            $smtp->execute(array(
                ':id' => $this->ID
            ));

            // verificar se retornou dados
            if ($smtp->rowCount() > 0) {

                header('location:index.php');
            }
        }

    }
}























?>