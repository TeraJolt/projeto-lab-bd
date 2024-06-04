<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
            include('../conexao.php');

            $id = $_POST["id"];

            $query = "DELETE FROM tb_forma_pagto WHERE id = $id";

            $resultado = mysqli_query($con, $query);

            if($resultado) {
                echo "Forma de pagamento excluída com sucesso!";
            }else{
                echo "Erro ao excluir a Forma de pagamento: ".mysqli_error($con);
            }

            mysqli_close($con);

            header("Location: consultarFormaPagamento.php");

        }elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
            header("Location: consultarFormaPagamento.php");
            exit;
        }
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Forma Pagamento</title>
</head>
<body>
    <h1>Excluir Forma Pagamento</h1>
    <?php include('../navbar.php') ?>

    <?php
        if(isset($_GET['id'])){
            include('../conexao.php');
            
            $id = $_GET['id'];

            $query = "SELECT * FROM tb_forma_pagto WHERE id = $id";

            $resultado = mysqli_query($con, $query);
            $registro = mysqli_fetch_assoc($resultado);

            if ($registro) {


                echo "<p>ID: ".$registro['id']."</p>";
                echo "<p>Nome: ".$registro['nome']."</p>";

                echo "<p>Confirma a exclusão?</p>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='id' value='".$registro['id']."'>";
                echo "<input type='submit' name='confirmar' value='Sim'>";
                echo "<input type='submit' name='cancelar' value='Não'>";
            }else{
                echo "Produto não encontrada.";
            }

            mysqli_close($con);
        }else{
            echo "ID do produto não especificado";
        }
    ?>
</body>
</html>