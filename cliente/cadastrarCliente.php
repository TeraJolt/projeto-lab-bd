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
    <form method="POST">
        <label>Nome<input type="text" maxlength="100" name="nome"></label>
        <label>Endereco<input type="text" maxlength="100" name="endereco"></label>
        <label>Número<input type="text" maxlength="10" name="numero"></label>
        <label>Bairro<input type="text" maxlength="100" name="bairro"></label>
        <label>Cidade<input type="text" maxlength="100" name="cidade"></label>
        <select name="estado">
            <option value="" disabled selected>-</option>
            <option value="AC">Acre</option><option value="AL">Alagoas</option><option value="AP">Amapá</option>
            <option value="AM">Amazonas</option><option value="BA">Bahia</option><option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option><option value="ES">Espírito Santo</option><option value="GO">Goiás</option>
            <option value="MA">Maranhão</option><option value="MT">Mato Grosso</option><option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option><option value="PA">Pará</option><option value="PB">Paraíba</option>
            <option value="PR">Paraná</option><option value="PE">Pernambuco</option><option value="PI">Piauí</option>                    
            <option value="RJ">Rio de Janeiro</option><option value="RN">Rio Grande do Norte</option><option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option><option value="RR">Roraima</option><option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option><option value="SE">Sergipe</option><option value="TO">Tocantins</option>
        </select></label>
        <label>Email<input type="email" maxlength="100" name="email"></label>
        <label>CPF/CNPJ<input type="text" maxlength="14" name="cpf_cnpj"></label>
        <label>RG<input type="text" maxlength="9" name="rg"></label>
        <label>Telefone<input type="text" maxlength="10" name="telefone"></label>
        <label>Celular<input type="text" maxlength="11" name="celular"></label>
        <label>Data de Nascimento<input type="date" name="data_nasc"></label>
        <label>Salário<input type="number" step="200" name="salario"></label>
        
        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar">
    </form>    
</body>
</html>