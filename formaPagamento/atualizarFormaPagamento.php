<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('../navbar.php') ?>
    <h1>Atualizar Produto</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && ISSET($_POST['atualizar'])) {
            
            include('../conexao.php');

            $id = $_POST['id'];
            $nome = $_POST['nome'];

            

            $query = "UPDATE tb_forma_pagto SET nome = '$nome' WHERE id = $id";

            $resu = mysqli_query($con, $query);

            if ($resu) {
                echo "Atualização realizada com sucesso";
            } else {
                echo "ERRO ao atualizar os dados: ".mysqli_error($con);
            }

            mysqli_close($con);
            header("Location: consultarFormaPagamento.php");
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
            header("Location: consultarFormaPagamento.php");
        }
    ?>
    <?php

        if(isset($_GET['id'])){
            include('../conexao.php');

            $id = $_GET['id'];

            $query = "SELECT * FROM tb_forma_pagto WHERE id = $id";
            $resu = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($resu);
        
    ?>

    <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label> Nome: 
            <input type="text" maxlength="100" name="nome" required value="<?php echo $row['nome'] ; ?>">
            </label> 
            <br>
            
            <input type="submit" name="atualizar" value="Atualizar">
            <input type="submit" name="cancelar" value="Cancelar">

        </form>
        </p>
    <?php
        }
    ?>

</body>
</html>