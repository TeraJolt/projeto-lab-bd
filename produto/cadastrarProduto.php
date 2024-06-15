<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Produto</title>
    </head>
    <body>
        
        <?php include('../navbar.php');
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                include('../conexao.php');
                $nome = $_POST["nome"];
                $qtde = $_POST["qtde"];
                $preco = $_POST["preco"];
                $medida = $_POST["medida"];
                $promocao = $_POST["promocao"];
        
                $query = "INSERT INTO tb_produto (nome, qtde_estoque, preco, unidade_medida, promocao) 
                VALUES ('$nome', '$qtde', '$preco', '$medida', '$promocao')";
        
                $retorno = mysqli_query($con, $query);
        
                if(mysqli_insert_id($con)){
                    echo "Inclusão realizada com sucesso!!";
                }else{
                    echo "Erro ao inserir os dados: ".mysqli_connect_error();
                }
        
                mysqli_close($con);
            }
        ?>
        <h1>Cadastro de Produto</h1>
        <form method="post">
            <p><label>Nome: <input type="text" maxlength="100" name="nome" id="nome"> </label></p>
            <p><label>Quantidade em estoque: <input type="number" name="qtde" id="qtde"> </label></p>
            <p><label>Preço: <input type="number" name="preco" id="preco"> </label></p>
            <p><label>Unidade de medida <input type="text" maxlength="20" name="medida" id="medida"> </label></p>
            <p><label>Promoção:
                <select name="promocao" id="promocao">
                    <option value="SIM"> Sim </option>
                    <option value="NAO"> Não </option>
                </select>
            </label></p>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </form>
    </body>
</html>