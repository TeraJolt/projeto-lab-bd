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
            <option value="ac">AC</option><option value="al">AL</option><option value="ap">AP</option>
            <option value="am">AM</option><option value="ba">BA</option><option value="ce">CE</option>
            <option value="df">DF</option><option value="es">ES</option><option value="go">GO</option>
            <option value="ma">MA</option><option value="mt">MT</option><option value="ms">MS</option>
            <option value="mg">MG</option><option value="pa">PA</option><option value="pb">PB</option>
            <option value="pr">PR</option><option value="pe">PE</option><option value="pi">PI</option>                    
            <option value="rj">RJ</option><option value="rn">RN</option><option value="rs">RS</option>
            <option value="ro">RO</option><option value="rr">RR</option><option value="sc">SC</option>
            <option value="sp">SP</option><option value="se">SE</option><option value="to">TO</option>
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