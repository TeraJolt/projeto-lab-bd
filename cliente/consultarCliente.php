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
        <label>Filtrar por Nome:</label>
        <input type="text" id="filtro_nome" name="filtro_nome"><br>
        <label>Filtrar por Cidade:</label>
        <input type="text" id="filtro_cidade" name="filtro_cidade"><br>
        <button type="submit">Filtrar</button>
    </form> 
    <table>
        <?php
            include('../conexao.php');

            $query = "SELECT * FROM tb_cliente";

            if(isset($_GET['filtro_nome']) && isset($_GET['filtro_cidade'])){
                $filtro_nome = $_GET['filtro_nome'];
                $filtro_cidade = $_GET['filtro_cidade'];
                $query .= " WHERE nome LIKE '%$filtro_nome%' AND cidade LIKE '%$filtro_cidade%'";

            } elseif(isset($_GET['filtro_nome'])){
                $filtro_nome = $_GET['filtro_nome'];
                $query .= " WHERE nome LIKE '%$filtro_nome%'";

            } elseif(isset($_GET['filtro_cidade'])){
                $filtro_cidade = $_GET['filtro_cidade'];
                $query .= " WHERE cidade LIKE '%$filtro_cidade%'";
            }

            $query .= " ORDER BY id";
            $resu = mysqli_query($con,$query) or die(mysqli_connect_error());

            echo "<tr>";
            echo "<td>Id</td>    ";
            echo "<td> <b> Nome </b></td>";
            echo "<td> <b> Cidade </b></td>";
            echo "<td> <b> email </b></td>";
            echo "<td> <b> CPF/CNPJ </b></td>";
            echo "</tr>";

            while ($reg = mysqli_fetch_array($resu)) {
                echo "<tr class='linha'><td class='id'>".$reg['id']."</td>";
                echo "<td class='nome'>".$reg['nome']."</td>";                        
                echo "<td class='cidade'>".$reg['cidade']."</td>";
                echo "<td class='email'>".$reg['email']."</td>";
                echo "<td class='cpf_cnpj'>".$reg['cpf_cnpj']."</td>";
                echo "<td class='editar'><a href='atualizarCliente.php?id=".$reg['id']."' class='txtEditEditar'>Editar</a></td>";
                echo "<td class='excluir'><a href='excluirCliente.php?id=".$reg['id']."' class='txtEditExcluir'>Excluir 🗑</a></td></tr>";
            }
            mysqli_close($con);
        ?>
    </table>    
</body>
</html>
