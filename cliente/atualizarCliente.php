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
    <h1>Atualizar Clientes</h1>
    <?php include('../navbar.php') ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                
        <div class="formulario">
            <p><label>Nome<input type="text" maxlength="100" name="nome" value="<?php echo $row['nome']; ?>"></label></p>
            <p><label>Endereco<input type="text" maxlength="100" name="endereco" value="<?php echo $row['endereco']; ?>"></label></p>
            <p><label>Número<input type="text" maxlength="10" name="numero" value="<?php echo $row['numero']; ?>"></label></p>
            <p><label>Bairro<input type="text" maxlength="100" name="bairro" value="<?php echo $row['bairro']; ?>"></label></p>
            <p><label>Cidade<input type="text" maxlength="100" name="cidade" value="<?php echo $row['cidade']; ?>"></label></p>           
            <p><label>Estado
            <select name="estado">   
                <?php $estado = isset($row['estado']) ? strtoupper($row["estado"]) : ''?>                                            
                <option value="ac"<?php if ($estado == "AC") echo " selected"; ?>>AC</option>
                <option value="al"<?php if ($estado == "AL") echo " selected"; ?>>AL</option>
                <option value="ap"<?php if ($estado == "AP") echo " selected"; ?>>AP</option>
                <option value="am"<?php if ($estado == "AM") echo " selected"; ?>>AM</option>
                <option value="ba"<?php if ($estado == "BA") echo " selected"; ?>>BA</option>
                <option value="ce"<?php if ($estado == "CE") echo " selected"; ?>>CE</option>
                <option value="df"<?php if ($estado == "DF") echo " selected"; ?>>DF</option>
                <option value="es"<?php if ($estado == "ES") echo " selected"; ?>>ES</option>
                <option value="go"<?php if ($estado == "GO") echo " selected"; ?>>GO</option>
                <option value="ma"<?php if ($estado == "MA") echo " selected"; ?>>MA</option>
                <option value="mt"<?php if ($estado == "MT") echo " selected"; ?>>MT</option>
                <option value="ms"<?php if ($estado == "MS") echo " selected"; ?>>MS</option>
                <option value="mg"<?php if ($estado == "MG") echo " selected"; ?>>MG</option>
                <option value="pa"<?php if ($estado == "PA") echo " selected"; ?>>PA</option>
                <option value="pb"<?php if ($estado == "PB") echo " selected"; ?>>PB</option>
                <option value="pr"<?php if ($estado == "PR") echo " selected"; ?>>PR</option>
                <option value="pe"<?php if ($estado == "PE") echo " selected"; ?>>PE</option>
                <option value="pi"<?php if ($estado == "PI") echo " selected"; ?>>PI</option>                    
                <option value="rj"<?php if ($estado == "RJ") echo " selected"; ?>>RJ</option>
                <option value="rn"<?php if ($estado == "RN") echo " selected"; ?>>RN</option>
                <option value="rs"<?php if ($estado == "RS") echo " selected"; ?>>RS</option>
                <option value="ro"<?php if ($estado == "RO") echo " selected"; ?>>RO</option>
                <option value="rr"<?php if ($estado == "RR") echo " selected"; ?>>RR</option>
                <option value="sc"<?php if ($estado == "SC") echo " selected"; ?>>SC</option>
                <option value="sp"<?php if ($estado == "SP") echo " selected"; ?>>SP</option>
                <option value="se"<?php if ($estado == "SE") echo " selected"; ?>>SE</option>
                <option value="to"<?php if ($estado == "TO") echo " selected"; ?>>TO</option>
            </select></label></p>
            <p><label>Email<input type="email" maxlength="100" name="email" value="<?php echo $row['email']; ?>"></label></p>
            <p><label>CPF/CNPJ<input type="text" maxlength="14" name="cpf_cnpj" value="<?php echo $row['cpf_cnpj']; ?>"></label></p>
            <p><label>RG<input type="text" maxlength="9" name="rg" value="<?php echo $row['rg']; ?>"></label></p>
            <p><label>Telefone<input type="text" maxlength="10" name="telefone" value="<?php echo $row['telefone']; ?>"></label></p>
            <p><label>Celular<input type="text" maxlength="11" name="celular" value="<?php echo $row['celular']; ?>"></label></p>
            <p><label>Data de Nascimento<input type="date" name="data_nasc" value="<?php echo $row['data_nasc']; ?>"></label></p>
            <p><label>Salário<input type="number" step="200" name="salario" value="<?php echo $row['salario']; ?>"></label></p>
        </div>
        <div class="botoes">
            <input type="submit" name="atualizar" value="Atualizar">
            <input type="submit" name="cancelar" value="Cancelar">
        </div>
    </form>
    <?php
    }
    ?>       