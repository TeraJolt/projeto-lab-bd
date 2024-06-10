<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Pedido</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sim'])) {
            include('../conexao.php');

            $id = $_POST["id"];

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            include("../conexao.php");
            mysqli_begin_transaction($con) or die(mysqli_connect_error());
            try{
                $query_item = "DELETE FROM tb_itens_pedido WHERE id_pedido = $id";
                $resu1 = mysqli_query($con,$query_item);
                
                $query = "DELETE FROM tb_pedido WHERE id = $id";
                $result = mysqli_query($con,$query);

                mysqli_commit($con);
                echo "<p>Pedido excluido com sucesso</p>";

            }
            catch(mysqli_sql_exception $exeption){
                mysqli_rollback($con);
                echo "<p>Erro ao excluir o pedido!</p>".$exeption;
            }
            mysqli_close($con);

            header("Location: consultarPedido.php");

        }elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nao'])) {
            header("Location: consultarPedido.php");
            exit;
        }
        include('../navbar.php');
    ?>
    <h1>Excluir pedido</h1>
    <?php
        if(isset($_GET['pedido_id'])){
            include('../conexao.php');

            $id = $_GET['pedido_id'];
            
            $query = "SELECT p.id as pedido_id, p.data_ped, c.nome as cliente, p.observacao, 
            fp.nome as forma_pagto, p.prazo_entrega, v.nome as vendedor FROM tb_pedido p 
            INNER JOIN tb_cliente c ON c.id = p.id_cliente
            INNER JOIN tb_forma_pagto fp ON fp.id = p.forma_pagto
            INNER JOIN tb_vendedor v ON v.id = p.id_vendedor WHERE p.id = $id";
            $resultado = mysqli_query($con, $query);
            $registro = mysqli_fetch_assoc($resultado);

            if($registro){
                echo
                "<p><b>ID: </b>".$registro['pedido_id']."</p>
                <p><b>Data: </b>".$registro['data_ped']."</p>
                <p><b>Cliente: </b>".$registro['cliente']."</p>
                <p><b>Observação: </b>".$registro['observacao']."</p>
                <p><b>Forma de Pagamento: </b>".$registro['forma_pagto']."</p>
                <p><b>Prazo de entrega: </b>".$registro['prazo_entrega']."</p>
                <p><b>Vendedor: </b>".$registro['vendedor']."</p>";

                $query2="SELECT p.nome as nome_produto, ip.qtde as quantidade FROM tb_itens_pedido ip 
                INNER JOIN tb_produto p ON ip.id_produto = p.id WHERE ip.id_pedido = ".$registro['pedido_id']." ORDER BY nome_produto";
                $resu2=mysqli_query($con,$query2) or die(mysqli_connect_error());
                $index=0;
                while($reg2 = mysqli_fetch_array($resu2)){
                    $index+=1;
                    echo 
                    "<p><b>Produto ".$index.": </b>".$reg2['nome_produto']."
                     <b> Quantidade: </b>".$reg2['quantidade']."</p>";
                }

                echo "<form method='POST'>
                        <table>
                            <input type='hidden' name='id' value='" . $id . "'>
                            <tr>
                                <td colspan='2'>Confirma a Exclusão?</td>
                            </tr>
                            <tr>
                                <td><input type='submit' name='sim' value='Sim'></td>
                                <td><input type='submit' name='nao' value='Não'></td>
                            </tr>
                        </table>
                    </form>";
            }else{
                echo "Pedido não encontrado";
            }
            mysqli_close($con);

        }else{
            echo "ID do pedido não especificado";
        }
    ?>
    
</body>
</html>