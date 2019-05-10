<?php
/**
 * Created by PhpStorm.
 * User: farlen
 * Date: 27/08/2018
 * Time: 07:56
 */
header("Content-type:text/html; charset=utf8");

// recuperar arquivo da classe
require_once "conexao/conexao.php";
//criar um objeto do tipo cargo
$mecanica = new mecanica();

// chamar a funcao para listar todos cargos
if(isset($_GET['pesquisa'])){
    $mecanica->pesquisa();
    $lista = $mecanica->pesquisa();
}else{
    $lista = $mecanica->listarAll();
}

if(isset($_GET['salvar'])){
    $mecanica->inserir();
}

if(isset($_GET['salvar'])){
    $mecanica->alterar();
}
//chamar a funcao excluir passando o codigo escolhido pelo usuário no botao excluir
if(isset($_GET["id"])){
$mecanica->excluir($_GET["id"]);
}
?>

<!DOCTYPE html>
<head>
    <title>Oficina 2.0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
    <script>
    </script>
</head>
<body>

<div class="container-fluid" style="height: 100%">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4 class="text-right">Oficina 2.0</h4>
            <div class="form-group" style="margin-top: -57px;">
                <form action="index.php" method="get">
                    <f class="nav nav-pills nav-stacked">
                        <h2 style="margin-bottom: 8px">Inserir</h2>
                        <li><label for="usr">ID:</label></li>
                        <li><input name="id" type="text" class="text-center form-control"></li>
                        <li><label for="usr">Cliente:</label></li>
                        <li><input name="cliente" type="text" class="text-center form-control"></li>
                        <li><label for="usr">Data:</label></li>
                        <li><input name="data" type="datetime-local" class="text-center form-control" value="<?=date('d/m/Y H:i')?>></li>
                        <li><label for="usr"><b>Vendedor:</b></label></li>
                        <li><input name="vendedor" type="text" class="text-center form-control"></li>
                        <li><label for="usr">Descrição:</label></li>
                        <li><input name="descricao" type="text" class="text-center form-control"></li>
                        <li><label for="usr">Valor do Orçamento:</label></li>
                        <li><input name="valor" type="number" class="text-center form-control"></li><br>
                        <button name="salvar" type="submit" class="btn btn-success" style="width: 100%">Inserir e Alterar</button><br>
                </form>
                <form action="index.php" method="get">
                        <h2 style="margin-bottom: 8px">Pesquisar</h2>
                        <li><label for="usr">Cliente:</label></li>
                        <li><input name="cliente" type="text" class="text-center form-control"></li><br>
                        <button name="pesquisa" type="submit" class="btn btn-info" style="width: 100%">Buscar</button>
                </form>
                    </ul><br>
                    </div>

        </div>

        <div class="col-sm-9"><br>
            <table class="table table-striped">
                <thead>

                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data do Orçamento</th>
                    <th>Vendedor</th>
                    <th>Descrição</th>
                    <th>Valor orçado</th>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php if($lista) : ?>
                <?php foreach ($lista as $mecanica) : ?>
                <tr>
                    <td><?php echo $mecanica->id; ?></td>
                    <td><?php echo $mecanica->cliente; ?></td>
                    <td><?php echo $mecanica->dt_orcamento; ?></td>
                    <td><?php echo $mecanica->vendedor; ?></td>
                    <td><?php echo $mecanica->descricao; ?></td>
                    <td><?php echo $mecanica->valor_orcado; ?></td>
                    <td>
                        <a href="index.php?id=<?php echo $mecanica->id; ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="6">
                        Nenhum registro encontrado
                    </td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
