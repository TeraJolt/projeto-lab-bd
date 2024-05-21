<?php
    include("../conexao.php");
    // Consulta para obter os itens
    $query = "SELECT * FROM tb_produto ORDER BY nome;";
    $result = mysqli_query($con,$query);

    $items = array();
    $items[] = '---';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    } 
    mysqli_close($con);
    // Retorna os itens como JSON
    echo json_encode($items);
?>