<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Vendedor</title>
    
</head>
<body>
    <h1>Consulta Vendedor</h1>
    <form method="POST">
        <table border="1" width="100%">
            <?php
                include("../conexao.php");
                $query="SELECT * FROM tb_vendedor ORDER BY nome";
                $resu=mysqli_query($conn,$query) or die(mysqli_connect_error());
                echo"
                <tr>
                    <th>Nome</th>
                    <th>Endereco</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Perc. Comissão</th>
                    <th>Opções</th>
                </tr>";
            ?>
            <?php
                while($reg = mysqli_fetch_array($resu)) {
                    echo 
                    "<tr>
                        <td>".$reg['nome']."</td>
                        <td>".$reg['endereco']."</td>
                        <td>".$reg['cidade']."</td>
                        <td>".$reg['estado']."</td>
                        <td>".$reg['celular']."</td>
                        <td>".$reg['email']."</td>
                        <td>".$reg['perc_comissao']."</td>
                        <table><tr>
                        <td></td>
                        
                        </tr></table>
                    </tr>"
            ?>
        </table>
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