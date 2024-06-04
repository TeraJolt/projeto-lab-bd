<?php         
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) {
    include('../conexao.php');

    $id=$_POST["id"];
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
    
    $query="UPDATE tb_cliente SET 
    nome='$nome',
    endereco='$endereco',
    numero='$numero',
    bairro='$bairro',
    cidade='$cidade',
    estado='$estado',
    email='$email',
    cpf_cnpj='$cpf_cnpj',
    rg='$rg',
    telefone='$telefone',
    celular='$celular',
    data_nasc='$data_nasc',
    salario='$salario'    
    WHERE id=$id";

    $resu=mysqli_query($con,$query);

    if ($resu) {
        echo "Atualização realizada com sucesso!";
    } else {
        echo "ERRO ao atualizar os dados: ".mysqli_error($con);
    }

    mysqli_close($con);

    header("Location: consultarCliente.php");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
    header("Location: consultarCliente.php");
}
?>
<?php
if (isset($_GET['id'])) {
    include('../conexao.php');

    $id=$_GET['id'];

    $query="SELECT * FROM tb_cliente WHERE id=$id";

    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <?php include('../navbar.php');?>
    <h1>Atualizar Clientes</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                
        <div class="formulario">
            <p><label>Nome: <input type="text" maxlength="50" name="nome" size="50" value="<?php echo $row['nome']; ?>"></label></p>
            <p><label>Endereço: <input type="text" maxlength="50" name="endereco" size="50" value="<?php echo $row['endereco']; ?>"></label></p>
            <p><label>Número: <input type="text" maxlength="10" name="numero" size="10" value="<?php echo $row['numero']; ?>"></label></p>
            <p><label>Bairro:<input type="text" maxlength="30" name="bairro" size="30" value="<?php echo $row['bairro']; ?>"></label></p>
            <p><label>Cidade:<input type="text" maxlength="30" name="cidade" size="30" value="<?php echo $row['cidade']; ?>"></label></p>           
            <p><label>Estado:
            <select name="estado">   
                <?php $estado = isset($row['estado']) ? strtoupper($row["estado"]) : ''?>                                            
                <option value="AC"<?php if ($estado == "AC") echo " selected"; ?>>AC</option>
                <option value="AL"<?php if ($estado == "AL") echo " selected"; ?>>AL</option>
                <option value="AP"<?php if ($estado == "AP") echo " selected"; ?>>AP</option>
                <option value="AM"<?php if ($estado == "AM") echo " selected"; ?>>AM</option>
                <option value="BA"<?php if ($estado == "BA") echo " selected"; ?>>BA</option>
                <option value="CE"<?php if ($estado == "CE") echo " selected"; ?>>CE</option>
                <option value="DF"<?php if ($estado == "DF") echo " selected"; ?>>DF</option>
                <option value="ES"<?php if ($estado == "ES") echo " selected"; ?>>ES</option>
                <option value="GO"<?php if ($estado == "GO") echo " selected"; ?>>GO</option>
                <option value="MA"<?php if ($estado == "MA") echo " selected"; ?>>MA</option>
                <option value="MT"<?php if ($estado == "MT") echo " selected"; ?>>MT</option>
                <option value="MS"<?php if ($estado == "MS") echo " selected"; ?>>MS</option>
                <option value="MG"<?php if ($estado == "MG") echo " selected"; ?>>MG</option>
                <option value="PA"<?php if ($estado == "PA") echo " selected"; ?>>PA</option>
                <option value="PB"<?php if ($estado == "PB") echo " selected"; ?>>PB</option>
                <option value="PR"<?php if ($estado == "PR") echo " selected"; ?>>PR</option>
                <option value="PE"<?php if ($estado == "PE") echo " selected"; ?>>PE</option>
                <option value="PI"<?php if ($estado == "PI") echo " selected"; ?>>PI</option>                    
                <option value="RJ"<?php if ($estado == "RJ") echo " selected"; ?>>RJ</option>
                <option value="RN"<?php if ($estado == "RN") echo " selected"; ?>>RN</option>
                <option value="RS"<?php if ($estado == "RS") echo " selected"; ?>>RS</option>
                <option value="RO"<?php if ($estado == "RO") echo " selected"; ?>>RO</option>
                <option value="RR"<?php if ($estado == "RR") echo " selected"; ?>>RR</option>
                <option value="SC"<?php if ($estado == "SC") echo " selected"; ?>>SC</option>
                <option value="SP"<?php if ($estado == "SP") echo " selected"; ?>>SP</option>
                <option value="SE"<?php if ($estado == "SE") echo " selected"; ?>>SE</option>
                <option value="TO"<?php if ($estado == "TO") echo " selected"; ?>>TO</option>
            </select></label></p>
            <p><label>Email: <input type="email" maxlength="50" name="email" size="50" value="<?php echo $row['email']; ?>"></label></p>
            <p><label>CPF/CNPJ: <input type="text" maxlength="14" name="cpf_cnpj" size="14" value="<?php echo $row['cpf_cnpj']; ?>"></label></p>
            <p><label>RG: <input type="text" maxlength="9" name="rg" size="9" value="<?php echo $row['rg']; ?>"></label></p>
            <p><label>Telefone: <input type="text" maxlength="10" name="telefone" size="10" value="<?php echo $row['telefone']; ?>"></label></p>
            <p><label>Celular: <input type="text" maxlength="11" name="celular" size="11" value="<?php echo $row['celular']; ?>"></label></p>
            <p><label>Data de Nascimento: <input type="date" name="data_nasc" value="<?php echo $row['data_nasc']; ?>"></label></p>
            <p><label>Salário: <input type="number" step="200" name="salario" size="14" value="<?php echo $row['salario']; ?>"></label></p>
        </div>
        <div class="botoes">
            <input type="submit" name="atualizar" value="Atualizar">
            <input type="submit" name="cancelar" value="Cancelar">
        </div>
    </form>
    <?php
    }
    ?>       