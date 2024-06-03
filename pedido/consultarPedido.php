<?php
    include('../conexao.php');

    $query = " SELECT p.id as pedido_id, p.data_ped, 
    c.nome as cliente, p.observacao, 
    fp.nome as forma_pagto, 
    p.prazo_entrega, 
    v.nome as vendedor FROM tb_pedido p 
    INNER JOIN tb_cliente c ON c.id = p.id_cliente 
    INNER JOIN tb_forma_pagto fp ON fp.id = p.forma_pagto 
    INNER JOIN tb_vendedor v ON v.id = p.id_vendedor ";

if(isset($_GET['filtro_dt_init']) && isset($_GET['filtro_dt_final'])){
    $dt_init = $_GET['filtro_dt_init'];
    $dt_final = $_GET['filtro_dt_final'];
    if (!empty($dt_init) && !empty($dt_final)) {
        $query .= " WHERE p.data_ped >= '$dt_init' AND p.data_ped <= '$dt_final' ";
    }
}

if (isset($_GET['filtro_nome']) && $_GET['filtro_nome'] != '') {
    $filtro_nome = $_GET['filtro_nome'];
    echo "nome: $filtro_nome";
    $query.=" AND c.nome LIKE '%$filtro_nome%'";
}

    $query .= " ORDER BY p.data_ped";
    $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Pedido</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .editar, .excluir {
            text-align: center;
        }
        .editar a, .excluir a {
            text-decoration: none;
            color: blue;
        }
        .editar a:hover, .excluir a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php 
        include('../navbar.php');
        $navBar = new NavBar;
        $navBar->navBar();
    ?>
    <h1>Consulta Pedido</h1>
    <form method="$_GET">
        <h2>Filtro por data</h2>
        <label>Data inicila:</label>
        <input type="text" id="filtro_dt_init" name="filtro_dt_init" ><br>
        <label>Data final:</label>
        <input type="text" id="filtro_dt_final" name="filtro_dt_final"><br>
        <h2>Filtro</h2>
        <label>Nome do cliente: </label>
        <input type="text" id="filtro_nome" name="filtro_nome" ><br>
        <button type="submit">Filtrar</button>
    </form>    
    
    <table>
        <?php
            while($reg = mysqli_fetch_array($resu)){
                echo"<fieldset><table width='100%' border='1px'><tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>Observação</th>
                <th>Forma de Pagamento</th>
                <th>Prazo de Entrega</th>
                <th>Vendedor</th>
                <th>Opções<th>
                </tr>
                <tr>
                    <td>".$reg['data_ped']."</td>
                    <td>".$reg['cliente']."</td>
                    <td>".$reg['observacao']."</td>
                    <td>".$reg['forma_pagto']."</td>
                    <td>".$reg['prazo_entrega']."</td>
                    <td>".$reg['vendedor']."</td>
                    <td width='10%'><table border='1' width='100%'><tr>
                        <td><a href='excluirPedido.php?pedido_id=".$reg['pedido_id']."'>Excluir</td>
                    </tr></table></td>
                </tr></table>";
                $query2 = "SELECT p.nome as nome_produto, ip.qtde as quantidade FROM tb_itens_pedido ip 
                INNER JOIN tb_produto p ON ip.id_produto = p.id WHERE ip.id_pedido = ".$reg['pedido_id']." ORDER BY nome_produto";
                $resu2=mysqli_query($con,$query2) or die(mysqli_connect_error());
                echo "
                <table border='1px'><tr>
                    <th>Nome do produto</th>
                    <th>Quantidade</th>
                </tr>";
                while($reg2 = mysqli_fetch_array($resu2)){
                    echo "
                    <tr>
                        <td>".$reg2['nome_produto']."</td>
                        <td>".$reg2['quantidade']."</td>
                    </tr>";
                }
                echo "</table></fieldset>";
            }
        ?>
    </form>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>