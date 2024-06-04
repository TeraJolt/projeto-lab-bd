<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include('../conexao.php');

        $nome=$_POST['nome'];
        $endereco=$_POST['endereco'];
        $numero=$_POST['numero'];    
        $bairro=$_POST['bairro'];
        $cidade=$_POST['cidade'];
        $estado=strtoupper($_POST['estado']);
        $email=$_POST['email'];
        $cpf_cnpj=$_POST['cpf_cnpj'];
        $rg=$_POST['rg'];    
        $telefone=$_POST['telefone'];
        $celular=$_POST['celular'];
        $data_nasc=$_POST['data_nasc'];
        $salario=$_POST['salario'];

        $query="INSERT INTO tb_cliente (nome,endereco,numero,bairro,cidade,estado,email,cpf_cnpj,rg,telefone,celular,
        data_nasc,salario) VALUES
        ('$nome','$endereco','$numero','$bairro','$cidade','$estado','$email','$cpf_cnpj','$rg','$telefone','$celular',
        '$data_nasc','$salario')";

        $resu=mysqli_query($con,$query);

        if (mysqli_insert_id($con)) {
            echo "<br><font color=blue> Inclusão realizada com sucesso !!</font>";
        } else {
            echo "<br><font color=red> ERRO: Inclusão não realizada !!</font>";
        }

        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <?php include('../navbar.php');
        $navBar = new NavBar;
        $navBar->navBar();
    ?>
    <h1>Cadastrar Cliente</h1>
    <form method="POST">
        <p><label>Nome: <input type="text" maxlength="50" name="nome" size="50"></label></p>
        <p><label>Endereço: <input type="text" maxlength="50" name="endereco" size="50"></label></p>
        <p><label>Número: <input type="text" maxlength="10" name="numero" size="10"></label></p>
        <p><label>Bairro: <input type="text" maxlength="30" name="bairro" size="30"></label></p>
        <p><label>Cidade: <input type="text" maxlength="30" name="cidade" size="30"></label></p>
        <p><label>Estado: 
            <select name="estado">
                <option value="" disabled selected>-</option>
                <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option>
                <option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option>
                <option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option>
                <option value="MA">MA</option><option value="MT">MT</option><option value="MS">MS</option>
                <option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option>
                <option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option>                    
                <option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option>
                <option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option>
                <option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option>
            </select></label>
        <p><label>Email: <input type="email" maxlength="50" name="email" size="50"></label></p>
        <p><label>CPF/CNPJ: <input type="text" maxlength="14" name="cpf_cnpj" size="14"></label></p>
        <p><label>RG: <input type="text" maxlength="9" name="rg" size="9"></label></p>
        <p><label>Telefone: <input type="text" maxlength="10" name="telefone" size="10"></label></p>
        <p><label>Celular: <input type="text" maxlength="11" name="celular" size="11"></label></p>
        <p><label>Data de Nascimento: <input type="date" name="data_nasc"></label></p>
        <p><label>Salário: <input type="number" step="200" name="salario" size="14"></label></p>
               
        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar">        
    </form>    
</body>
</html>