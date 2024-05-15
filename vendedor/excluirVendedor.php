<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Vendedor</title>
</head>
<body>
    <h1>Excluir Vendedor</h1>
    <?php
        if(isset($_GET['id'])){
            include('../conexao.php');
            $id = $_GET["id"];

            $query = "SELECT * FROM tb_vendedor WHERE id = '$id'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if($row){
                echo  
                    "<p><label>ID: ".$row['id']."</label></p>
                    <p><label>Nome: ".$row['nome']."</label></p>
                    <p><label>Endereço: ".$row['endereco']."</label></p>
                    <p><label>Cidade: ".$row['cidade']."</label></p>
                    <p><label>Estado: ".$row['estado']."</label></p>
                    <p><label>Celular: ".$row['celular']."</label></p>
                    <p><label>Email: ".$row['email']."</label></p>
                    <p><label>Perc. Comissão: ".$row['perc_comissao']."</label></p>
                    <br><br>
                    <form method='POST'>
                        <table>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <tr>
                                <td colspan='2'>Confirma a Exclusão?</td>
                            </tr>
                            <tr>
                                <td><input type='submit' name='sim' value='Sim'></td>
                                <td><input type='submit' name='nao' value='Não'></td>
                            </tr>
                        </table>
                    </form>";
            }else{
                echo "Vendedor não encontrado.";
            }
            mysqli_close($con);
        }else{
            echo "ID do Vendedor não especificado.";
        }
    ?>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sim'])){
            include('../conexao.php');
            $id = $_POST['id'];
            $query = "DELETE FROM tb_vendedor WHERE id = '$id'";
            $result = mysqli_query($con,$query);
            if ($result){
                echo "Vendedor excluído com Sucesso!";
            } else{
                echo "Erro ao excluir o Vendedor: ".mysqli_error($con);
            }
            mysqli_close($con);
            header("Location: consultarVendedor.php");
        }elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nao'])){
            header("Location: consultarVendedor.php");
            exit;
        }
    ?>
</body>
</html>