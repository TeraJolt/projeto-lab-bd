<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
        include('../conexao.php');

        $id = $_POST["id"];

        $query = "DELETE FROM tb_pedido WHERE id = $id";

        $resultado = mysqli_query($con, $query);

        if($resultado) {
            echo "Pedido excluído com sucesso!";
        }else{
            echo "Erro ao excluir o pedido: ".mysqli_error($con);
        }

        mysqli_close($con);

        header("Location: consultarPedido.php");

    }elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
        header("Location: consultarPedido.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Pedido</title>
</head>
<body>
    <h1>Excluir pedido</h1>

    <?php
        if(isset($GET['pedido_id'])){
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
                "<p>ID: ".$registro['pedido_id']."</p>
                <p>Data: ".$registro['data_ped']."</p>
                <p>Cliente: ".$registro['cliente']."</p>
                <p>Observação: ".$registro['observacao']."</p>
                <p>Forma de Pagamento".$registro['forma_pagto']."</p>
                <p>Prazo de entrega".$registro['prazo_entrega']."</p>
                <p>Vendedor".$registro['vendedor']."</p>";
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