<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php include('../navbar.php');?>
    <h1>Atualizar Produto</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && ISSET($_POST['atualizar'])) {
            
            include('../conexao.php');

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $qtde = $_POST['qtde'];
            $preco = $_POST['preco'];
            $medida = $_POST['medida'];
            $promocao = $_POST['promocao'];

            

            $query = "UPDATE tb_produto SET nome = '$nome', qtde_estoque = '$qtde', preco = '$preco', unidade_medida = '$medida', promocao = '$promocao'  WHERE id = $id";

            $resu = mysqli_query($con, $query);

            if ($resu) {
                echo "Atualização realizada com sucesso";
            } else {
                echo "ERRO ao atualizar os dados: ".mysqli_error($con);
            }

            mysqli_close($con);
            header("Location: consultarProduto.php");
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
            header("Location: consultarProduto.php");
        }
    ?>
    <?php

        if(isset($_GET['id'])){
            include('../conexao.php');

            $id = $_GET['id'];

            $query = "SELECT * FROM tb_produto WHERE id = $id";
            $resu = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($resu);
        
    ?>

    <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label> Nome: 
            <input type="text" maxlength="100" name="nome" required value="<?php echo $row['nome'] ; ?>">
            </label> 
            <br>

            <label> Quantidade de estoque: </label> 
            <input type="number" maxlength="100" name="qtde" required value="<?php echo $row['qtde_estoque'] ; ?>">
            
            <br>

            <label> Preço: </label> 
            <input type="numeric" maxlength="10" name="preco" value="<?php echo $row['preco']; ?>">
            
            <br>

            <label> Unidade de medida: </label> 
            <input type="text" maxlength="50" name="medida" required value="<?php echo $row['unidade_medida'] ; ?>">

            <br>

            <label> Promocao: </label> 
            <select name="promocao" id="promocao">
                <!-- <option value="<?php echo $row['promocao']; ?>"> <?php echo $row['promocao']; ?> </option> -->
                <option value="SIM"> SIM </option>
                <option value="NAO"> NÃO </option>
            </select>
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