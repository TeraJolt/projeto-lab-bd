<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exibir de Produto</title>
    </head>
    <body>
        
        <?php include('../navbar.php');
            $navBar = new NavBar;
            $navBar->navBar();
        ?>
        <h1>Exibir de Produto</h1>
        <form>
            <label>Filtrar por Nome:</label>
            <input type="text" id="filtro_nome" name="filtro_nome">
            <button type="submit">Filtrar</button>
        </form>

        <form method="post">
            <table>
                <?php
                    include('../conexao.php');
                    
                    $query = "SELECT * FROM tb_produto ";

                    if (isset($_GET['filtro_nome'])) {
                        $filtro_nome = $_GET['filtro_nome'];
                        $query .="WHERE nome LIKE '%$filtro_nome%'";
                    }

                    $query .= " ORDER BY nome";
                    $resultado = mysqli_query($con, $query) or die(mysqli_connect_error());
                    
                    echo "<tr>";
                    echo "<td> <b> Nome </b> </td>";
                    echo "<td> <b> Quantidade </b> </td>";
                    echo "<td> <b> Preço </b> </td>";
                    echo "<td> <b> Unidade de medida </b> </td>";
                    echo "<td> <b> Promoção </b> </td>";
                    echo "</tr>";
                    
                    while ($registro = mysqli_fetch_array($resultado)){
                        
                        echo "<tr>";
                        echo "<td>".$registro['nome']."</td>";
                        echo "<td>".$registro['qtde_estoque']."</td>";
                        echo "<td>".$registro['preco']."</td>";
                        echo "<td>".$registro['unidade_medida']."</td>";
                        echo "<td>".$registro['promocao']."</td>";

                        echo "<td> <a href='atualizarProduto.php?id=".$registro['id']."'> Editar </a></td>";
                        echo "<td> <a href='excluirProduto.php?id=".$registro['id']."'> Excluir </a></td>";
                        echo "</tr>";

                    }

                ?>
            </table>
        </form>
        <?php
            mysqli_close($con);
        ?>
    </body>
</html>