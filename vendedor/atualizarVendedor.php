<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Vendedor</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])){
            include('../conexao.php');

            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $endereco = $_POST["endereco"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $celular = $_POST["celular"];
            $email = $_POST["email"];
            $perc_comissao = $_POST["perc_comissao"];

            $query = "UPDATE tb_vendedor SET nome='$nome', endereco='$endereco', cidade='$cidade',
            estado='$estado', celular='$celular', email='$email', perc_comissao='$perc_comissao' WHERE id = '$id'";

            $resu=mysqli_query($con,$query);

            if($resu){
                echo "Atualização realizada com sucesso!";
            }else{
                echo "Erro ao atualizar os dados: ".mysqli_error($con);
            }

            mysqli_close($con);
            header("Location: consultarVendedor.php");
        }elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
            header("Location: consultarVendedor.php");
        }
    ?>
    <?php
        if(isset($_GET['id'])){
            include('../conexao.php');
            $id = $_GET['id'];
            $query2 = "SELECT * FROM tb_vendedor WHERE id = '$id'";
            $result = mysqli_query($con,$query2);
            $row = mysqli_fetch_assoc($result);
    ?>
    <h1>Atualizar Vendedor</h1>
    <?php include('../navbar.php') ?>
    <form method="POST">
        <p><label><input type="hidden" name="id" value="<?php echo $row['id'];?>"></label></p>
        <p><label>Nome: <input type="text" name="nome" size="50" maxlength="100" required value="<?php echo $row['nome'];?>"></label></p>
        <p><label>Endereço: <input type="text" name="endereco" size="50" maxlength="150" required value="<?php echo $row['endereco'];?>"></label></p>
        <p><label>Cidade: <input type="text" name="cidade" size="50" maxlength="50" required value="<?php echo $row['cidade'];?>"></label></p>
        <p><label>Estado: 
            <select name="estado">
                <option value="<?php echo $row['estado'];?>" selected><?php echo $row['estado'];?></option>
                <option value="AC">Acre</option><option value="AL">Alagoas</option><option value="AP">Amapá</option>
                <option value="AM">Amazonas</option><option value="BA">Bahia</option><option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option><option value="ES">Espírito Santo</option><option value="GO">Goiás</option>
                <option value="MA">Maranhão</option><option value="MT">Mato Grosso</option><option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option><option value="PA">Pará</option><option value="PB">Paraíba</option>
                <option value="PR">Paraná</option><option value="PE">Pernambuco</option><option value="PI">Piauí</option>                    
                <option value="RJ">Rio de Janeiro</option><option value="RN">Rio Grande do Norte</option><option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option><option value="RR">Roraima</option><option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option><option value="SE">Sergipe</option><option value="TO">Tocantins</option>
            </select>
        </label></p>
        <p><label>Celular: <input type="text" name="celular" size="15" maxlength="15" placeholder="(XX) XXXXX-XXXX" required value="<?php echo $row['celular'];?>"></label></p>
        <p><label>Email: <input type="text" name="email" size="50" maxlength="160" required value="<?php echo $row['email'];?>"></label></p>
        <p><label>Porcentagem de Comissão: <input type="text" name="perc_comissao" size="5" maxlength="5" required value="<?php echo $row['perc_comissao'];?>"></label></p>
        <label><input type="submit" value="Atualizar" name="atualizar"></label>
        <label><input type="submit" value="Cancelar" name="cancelar"></label>
    </form>
    <?php } ?>
</body>
</html>