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
    
</head>
<?php 
    include('../navbar.php');
    $navBar = new NavBar;
    $navBar->navBar();
?>
<body>
    <h1>Cadastro de Pedidos</h1>
    <form method="POST">
        <p><label>Data: 
            <input type="date" name="data_ped" id="date">
            <!-- <input type="text" name="data_ped" id="date"> -->
            <script>
                var dataAtual = new Date();
                var campoData = document.getElementById('date');
                var dataRec = dataAtual.toLocaleDateString('pt-BR');
                var dataFormatada = dataRec.substring(6,10)+"-"+dataRec.substring(3,5)+"-"+dataRec.substring(0,2);
                // campoData.value = dataRec;
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
        <table border='1px' id="productTable">
            <tr>
                <th><label for="select">Itens do Pedido</label></th>
                <th><label for="qtde">Quantidade</label></th>
            </tr>
            <tr>
                <td>
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
                </td>
                <td><input type="number" name="qtde[]" min="1" value="1"></td>
                <td><button type="button" onClick="addItem()">Adicionar Produto</button></td>
            </tr>
            <script>    
                function addItem(){    
                    var table =document.getElementById("productTable");
                    var newRow = table.insertRow(-1);

                    var selectCell =document.createElement("td");
                    selectCell.innerHTML=document.querySelector("#select").parentElement.innerHTML;

                    var quantityCell =document.createElement("td");
                    var quantityInput =document.createElement("input");
                    quantityInput.type = "number";
                    quantityInput.name = "qtde[]";
                    quantityInput.min = "1";
                    quantityInput.value = "1";
                    quantityCell.appendChild(quantityInput);

                    var actionCell = document.createElement("td");
                    var removeButton =document.createElement("button");
                    removeButton.type = "button";
                    removeButton.textContent = "Remover";
                    removeButton.onclick =function(){
                        var row = this.parentElement.parentElement;
                        row.parentElement.removeChild(row);
                    };
                    actionCell.appendChild(removeButton);

                    newRow.appendChild(selectCell);
                    newRow.appendChild(quantityCell);
                    newRow.appendChild(actionCell);
                }

            </script>
        </table>
        <label><input type="submit" value="Enviar"></label>
        <label><input type="reset" value="Limpar"></label>
    </form>
</body>
</html>