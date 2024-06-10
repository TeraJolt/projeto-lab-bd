<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
    <?php
        include('../navbar.php');       
    ?>

    <h1>Relatório de comissão dos vendedores</h1>
    <form action="pdf2.php" method="POST">
        <label>Data inicial: <input type="date" name="dataInicio"></label><br><br>
        <label>Data final: <input type="date" name="dataFim"></label><br><br>
        <input type="reset" value="Limpar">
        <input type="submit" value="Emitir">
    </form>
</body>
</html>