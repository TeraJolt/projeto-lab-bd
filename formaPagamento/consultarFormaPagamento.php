<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exibir de Forma Pagamento</title>
    </head>
    <body>
        <?php include('../navbar.php') ?>
        <h1>Exibir de Forma Pagamento</h1>
        <form method="post">
            <table>
                <?php
                    include('../conexao.php');
                    
                    $query = "SELECT * FROM tb_forma_pagto ";

                    $query .= " ORDER BY id";
                    $resultado = mysqli_query($con, $query) or die(mysqli_connect_error());
                    
                    echo "<tr>";
                    echo "<td> <b> Nome </b> </td>";
                    echo "</tr>";
                    
                    while ($registro = mysqli_fetch_array($resultado)){
                        
                        echo "<tr>";
                        echo "<td>".$registro['nome']."</td>";

                        echo "<td> <a href='atualizarFormaPagamento.php?id=".$registro['id']."'> Editar </a></td>";
                        echo "<td> <a href='excluirFormaPagamento.php?id=".$registro['id']."'> Excluir </a></td>";
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