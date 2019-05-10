<?php


define("server", "mysql:host=localhost;dbname=mecanica");
define('user', 'root');
define('senha', '');

class mecanica
{
    public $id;
    public $cliente;
    public $data;
    public $vendedor;
    public $descricao;
    public $valor;


    public function listarAll()
    {

        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        $smtp = $pdo->prepare("select * from loja_mecanica");


        $smtp->execute();


        if ($smtp->rowCount() > 0) {

            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function pesquisa()
    {

        if (isset($_GET["cliente"])) {
            $this->CLIENTE = $_GET["cliente"];

            $pdo = new PDO(server, user, senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $smtp = $pdo->prepare("select * from loja_mecanica where cliente = :cliente");

            $smtp->execute(array(
                ':cliente' => $_GET["cliente"]
            ));

            if ($smtp->rowCount() > 0) {

                return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
            }
        }
    }

    public function inserir()
    {
        if (isset($_GET["cliente"]) && isset($_GET["data"]) && isset($_GET["vendedor"]) && isset($_GET["descricao"]) && isset($_GET["valor"])) {

            $this->CLIENTE = $_GET["cliente"];
            $this->DATA = $_GET["data"];
            $this->VENDEDOR = $_GET["vendedor"];
            $this->DESCRICAO = $_GET["descricao"];
            $this->VALOR = $_GET["valor"];



            $pdo = new PDO(server, user, senha);

            $smtp = $pdo->prepare("insert into loja_mecanica values(:id,:cliente,:data, :vendedor,  :descricao, :valor_orcado)");

            $smtp->execute(array(
                ':id' => Null,
                ':cliente' => $this->CLIENTE,
                ':data' => $this->DATA,
                ':vendedor' => $this->VENDEDOR,
                ':descricao' => $this->DESCRICAO,
                ':valor_orcado' => $this->VALOR
            ));

            if ($smtp->rowCount() > 0) {

                header("location: index.php");
            }

        } else {

            header("location:./");
        }
    }


    public function alterar()
    {
        if (isset($_GET["id"]) && isset($_GET["cliente"]) && isset($_GET["data"]) && isset($_GET["vendedor"]) && isset($_GET["descricao"]) && isset($_GET["valor"])) {

            $this->ID = $_GET["id"];
            $this->CLIENTE = $_POST["cliente"];
            $this->DATA = $_GET["data"];
            $this->VENDEDOR = $_GET["vendedor"];
            $this->DESCRICAO = $_GET["descricao"];
            $this->VALOR = $_GET["valor"];

            $pdo = new PDO(server, user, senha);

            $smtp = $pdo->prepare("update loja_mecanica set cliente = :cliente,data = :data, vendedor = :vendedor,
                                                                                    descricao = :descricao, valor = :valor where id = :id");

            $smtp->execute(array(
                ':id' => $this->ID,
                ':cliente' => $this->CLIENTE,
                ':data' => $this->DATA,
                ':vendedor' => $this->VENDEDOR,
                ':descricao' => $this->DESCRICAO,
                ':valor_orcado' => $this->VALOR
            ));

            if ($smtp->rowCount() > 0) {

                header("location:./");
            }
        } else {

            header("location:./");
        }
    }


    public function listarCodigo($id)
    {


        if (isset($id)) {

            $this->ID = $id;

            $pdo = new PDO(server, user, senha);


            $smtp = $pdo->prepare("select * from loja_mecanica where id = :id");


            $smtp->execute(array(
                ':id' => $this->ID
            ));

            if ($smtp->rowCount() > 0) {

                return $result = $smtp->fetchObject();
            }
        }

    }

    public function excluir($id)
    {

        if (isset($id)) {
            $this->ID = $id;
            $pdo = new PDO(server, user, senha);

            $smtp = $pdo->prepare("delete from loja_mecanica where id = :id");

            $smtp->execute(array(
                ':id' => $this->ID
            ));

            if ($smtp->rowCount() > 0) {

                header('location:index.php');
            }
        }

    }
}























?>
