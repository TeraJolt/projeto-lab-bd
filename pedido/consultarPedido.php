<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Pedido</title>
</head>
<?php include('../navbar.php')?>
<body>
    <h1>Consulta Pedido</h1>
    <form method="POST">
        <?php
            include("../conexao.php");
            $query="SELECT p.id as pedido_id, p.data_ped, c.nome as cliente, p.observacao, 
            fp.nome as forma_pagto, p.prazo_entrega, v.nome as vendedor FROM tb_pedido p 
            INNER JOIN tb_cliente c ON c.id = p.id_cliente
            INNER JOIN tb_forma_pagto fp ON fp.id = p.forma_pagto
            INNER JOIN tb_vendedor v ON v.id = p.id_vendedor
            ORDER BY p.data_ped";
            $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
            // echo"
            // <tr>
            //     <th>Data</th>
            //     <th>Cliente</th>
            //     <th>Observação</th>
            //     <th>Forma de Pagamento</th>
            //     <th>Prazo de Entrega</th>
            //     <th>Vendedor</th>
            // </tr>";
        ?>
        <?php
            while($reg = mysqli_fetch_array($resu)){
                echo"
                <fieldset><table width='100%'><tr>
                    <td><b>Data:</b></td>
                    <td>".$reg['data_ped']."</td>
                    <td><b>Cliente:</b></td>
                    <td>".$reg['cliente']."</td>
                    <td><b>Observação:</b></td>
                    <td>".$reg['observacao']."</td>
                    <td><b>Forma de Pagamento:</b></td>
                    <td>".$reg['forma_pagto']."</td>
                    <td><b>Prazo de Entrega:</b></td>
                    <td>".$reg['prazo_entrega']."</td>
                    <td><b>Vendedor:</b></td>
                    <td>".$reg['vendedor']."</td>
                </tr></table></fieldset>";
            }
        ?>
    </form>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>