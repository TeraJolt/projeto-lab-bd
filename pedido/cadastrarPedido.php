<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $data_ped=$_POST["data_ped"];
        $id_cliente=$_POST["id_cliente"];
        $observacao=$_POST["observacao"];
        $forma_pagto=$_POST["forma_pagto"];
        $prazo_entrega=$_POST["prazo_entrega"];
        $id_vendedor=$_POST["id_vendedor"];
        $id_produto=$_POST["id_produto"];
        $qtde=$_POST["qtde"];

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        include("../conexao.php");
        mysqli_begin_transaction($con) or die(mysqli_connect_error());
        try{
            $query = "INSERT INTO tb_pedido (data_ped, id_cliente, observacao, forma_pagto, prazo_entrega, id_vendedor)
            VALUES ('$data_ped', '$id_cliente', '$observacao', '$forma_pagto', '$prazo_entrega', '$id_vendedor')";
            $result = mysqli_query($con,$query);
            $id_pedido = mysqli_insert_id($con);
            for($i = 0; $i < count($id_produto); $i++){
                $query_item = "INSERT INTO tb_itens_pedido (id_pedido, id_produto, qtde) VALUES ('$id_pedido','$id_produto[$i]',$qtde[$i])";
                $resu1 = mysqli_query($con,$query_item);
            }
            mysqli_commit($con);
            echo "<p>Pedido cadastrado com sucesso</p>";

        }
        catch(mysqli_sql_exception $exeption){
            mysqli_rollback($con);
            echo "<p>Pedido não foi cadastrado</p>".$exeption;
        }
        mysqli_close($con);
    }
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pedido</title>
    <script>    
        function addItem(){
            var divItem = document.getElementById("itens");
            var divQtde = document.getElementById("quantidades");
            var input = document.createElement("input");
            input.type = "number";
            input.name = "qtde[]";
            fetch('getProdutos.php')
                .then(response =>response.json())
                .then(data => {
                    let select =document.createElement('select');
                    data.forEach(item => {
                        let option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.nome;
                        select.name = "id_produto[]";
                        select.appendChild(option);
                    });
                    divItem.appendChild(select);
                    divQtde.appendChild(input);
                })
        }
    </script>
</head>
<?php include('../navbar.php')?>
<body>
    <h1>Cadastro de Pedidos</h1>
    <form method="POST">
        <p><label>Data: <input type="date" name="data_ped" id="date">
            <script>
                var dataAtual = new Date();
                var campoData = document.getElementById('date');
                var dataRec = dataAtual.toLocaleDateString('pt-BR');
                var dataFormatada = dataRec.substring(6,10)+"-"+dataRec.substring(3,5)+"-"+dataRec.substring(0,2);
                campoData.value = dataFormatada;
                //campoData.value = dataAtual.toISOString().substring(0,10);
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
        <p><label>Observação: <input type="text" name="observacao" size="30" maxlength="100"></label></p>
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
        <p><label>Prazo de entrega: <input type="text" name="prazo_entrega" size="20" maxlength="20"></label></p>
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
        <div id="itens"><label for="item_1">Itens do pedido:
            <select name="id_produto[]" id="select">
                <?php
                    include("../conexao.php");
                    $id_vendedor = $row['id'];
                    $query="SELECT * FROM tb_produto ORDER BY nome;";
                    $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
                ?>
                <option value="" disabled selected>---</option>
                <?php
                    while($reg = mysqli_fetch_assoc($resu)){
                ?>
                <option value="<?php echo $reg['id'];?>"><?php echo $reg['nome'];?></option>
                <?php } mysqli_close($con);?> 
            </select>
        </label></div>
        <div id="quantidades"><label>Quantidade: <input type="number" name="qtde[]"></label></div>    
        <button type="button" onClick="addItem()">Adicionar Produto</button>
        <label><input type="submit" value="Enviar"></label>
        <label><input type="reset" value="Limpar"></label>
    </form>
</body>
</html>