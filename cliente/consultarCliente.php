<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <h1>Consultar Clientes</h1>
    <?php include('../navbar.php') ?>
    <form> 
        <table>
            <tr>
            <td class='id'>Id</td>    
            <td class='titulo' colspan='3'>Nome</td>
            </tr>
            <?php
                include('../conexao.php');

                $query="SELECT * FROM tb_cliente ORDER BY id";
                $resu = mysqli_query($con,$query) or die(mysqli_connect_error());

                while ($reg = mysqli_fetch_array($resu)) {
                    echo "<tr class='linha'><td class='id'>".$reg['id']."</td>";
                    echo "<td class='nome'>".$reg['nome']."</td>";                        
                    echo "<td class='editar'><a href='atualizarCliente.php?id=".$reg['id']."' class='txtEditEditar'>Editar</a></td>";
                    echo "<td class='excluir'><a href='excluirCliente.php?id=".$reg['id']."' class='txtEditExcluir'>Excluir 🗑</a></td></tr>";
                }
            ?>
        </table>    
    </form>
    <?php
        mysqli_close($con);
    ?>  
</body>
</html