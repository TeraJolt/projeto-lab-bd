<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('../conexao.php');
        $nome = $_POST["nome"];

        $query = "INSERT INTO tb_forma_pagto (nome) 
        VALUES ('$nome')";

        $retorno = mysqli_query($con, $query);

        if(mysqli_insert_id($con)){
            echo "Inclusão realizada com sucesso!!";
        }else{
            echo "Erro ao inserir os dados: ".mysqli_connect_error();
        }

        mysqli_close($con);
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Forma Pagamento</title>
    </head>
    <body>
        <?php include('../navbar.php') ?>
        <h1>Cadastro de Forma Pagamento</h1>
        <form method="post">
            <p><label>Nome: <input type="text" maxlength="100" name="nome" id="nome"> </label></p>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </form>
    </body>
</html>