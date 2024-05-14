<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Vendedor</title>
    
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            include('../conexao.php');

            $nome=$_POST['nome'];
            $endereco=$_POST['endereco'];
            $cidade=$_POST['cidade'];
            $estado=$_POST['estado'];
            $celular=$_POST['celular'];
            $email=$_POST['email'];
            $perc_comissao=$_POST['perc_comissao'];
            
            $query = "INSERT INTO tb_vendedor (nome,endereco,cidade,estado,celular,email,perc_comissao)
            VALUES ('$nome','$endereco','$cidade','$estado','$celular','$email','$perc_comissao')";
            $result = mysqli_query($con, $query);
            if (mysqli_insert_id($con)){
                echo "Vendedor Cadastrado com Sucesso!!";
            }else{
                echo "Erro ao na tentativa de cadastro: ".mysqli_connect_error();
            }

            mysqli_close($con);
        }
    ?>
    <h1>Cadastro de Vendedor</h1>
    <form method="POST">
        <p>
            <label>Nome: <input type="text" name="nome" size="50" maxlength="100" required></label>
        </p>
        <p>
            <label>Endereço: <input type="text" name="endereco" size="50" maxlength="150" required></label>
        </p>
        <p>
            <label>Cidade: <input type="text" name="cidade" size="50" maxlength="50" required></label>
        </p>
        <p>
            <label>Estado: 
                <select name="estado">
                    <option value="" disabled selected>---</option>
                    <option value="ES">Espirito Santo</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="SP">São Paulo</option>
                </select>
            </label>
        </p>
        <p>
            <label>Celular: <input type="text" name="celular" size="15" maxlength="15" placeholder="(XX) XXXXX-XXXX"></label>
        </p>
        <p>
            <label>Email: <input type="text" name="email" size="50" maxlength="160" required></label>
        </p>
        <p>
            <label>Porcentagem de Comissão: <input type="text" name="perc_comissao" size="5" maxlength="5" required></label>
        </p>
        <label><input type="submit" value="Enviar"></label>
        <label><input type="reset" value="Limpar"></label>

    </form>
</body>
</html>