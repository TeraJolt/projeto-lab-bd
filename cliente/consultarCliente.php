<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <?php include('../navbar.php');?>
    <h1>Consultar Clientes</h1>
    <form>
        <label>Filtrar por Nome:</label>
        <input type="text" id="filtro_nome" name="filtro_nome"><br>
        <label>Filtrar por Cidade:</label>
        <input type="text" id="filtro_cidade" name="filtro_cidade"><br>
        <button type="submit">Filtrar</button>
    </form> 
    <?php
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
        include('../conexao.php');
        include('tabelaCliente.php');
    ?>    
</body>
</html>
