<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        include("../conexao.php");
        $data_ped=$_POST['data_ped'];
        $id_cliente=$_POST['id_cliente'];
        $observacao=$_POST['observacao'];
        
    }
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pedido</title>
</head>
<body>
    <h1>Cadastro de Pedidos</h1>
    <form method="POST">
        <p><label>Data: <input type="date" name="data_ped" id="date" disabled>
            <script>
                var dataAtual = new Date();
                var campoData = document.getElementById('date');
                campoData.value = dataAtual.toISOString().substring(0,10);
            </script>
        </label></p>
        <p><label>Cliente: <select name="id_cliente">
            <?php
                include("../conexao.php");
                $id_cliente = $row['id'];
                $query="SELECT * FROM tb_cliente ORDER BY nome;";
                $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
            ?>
            <option value="" disabled selected>---</option>
            <?php
                while($reg = mysqli_fetch_assoc($resu)){
            ?>
            <option value="<?php echo $reg['id'];?>"><?php echo $reg['nome'];?></option>
            <?php } mysqli_close($con);?>
        </select></label></p>
        <p><label>Observação: <input type="text" nome="observacao" size="30" maxlength="100"></label></p>
        <p><label>Forma de Pagamento: <select name="forma_pagto">
            <?php
                include("../conexao.php");
                $forma_pagto = $row['id'];
                $query="SELECT * FROM tb_forma_pagto ORDER BY nome;";
                $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
            ?>
            <option value="" disabled selected>---</option>
            <?php
                while($reg = mysqli_fetch_assoc($resu)){
            ?>
            <option value="<?php echo $reg['id'];?>"><?php echo $reg['nome'];?></option>
            <?php } mysqli_close($con);?>
        </select></label></p>
        <p><label>Prazo de entrega: <input type="text" nome="prazo_entrega" size="20" maxlength="20"></label></p>
        <p><label>Vendedor: <select name="id_vendedor">
            <?php
                include("../conexao.php");
                $id_vendedor = $row['id'];
                $query="SELECT * FROM tb_vendedor ORDER BY nome;";
                $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
            ?>
            <option value="" disabled selected>---</option>
            <?php
                while($reg = mysqli_fetch_assoc($resu)){
            ?>
            <option value="<?php echo $reg['id'];?>"><?php echo $reg['nome'];?></option>
            <?php } mysqli_close($con);?>        
        </select></label></p>
        <label><input type="submit" value="Enviar"></label>
        <label><input type="reset" value="Limpar"></label>
    </form>
</body>
</html>