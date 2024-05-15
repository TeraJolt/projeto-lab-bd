<?php
if (isset($_GET['id'])) {
    include('../conexao.php');

    $id=$_GET['id'];

    $query="SELECT * FROM tb_cliente WHERE id=$id";

    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);

    if ($row) {
        echo "<form method='POST'>";
            echo "<p>ID: ".$row['id']."</p>";
            echo "<p>Nome: ".$row['nome']."</p>";
            echo "<p>Confirma a exclusão?</p>";                    
            echo "<input type='hidden' name='id' name='id' value='".$row['id']."'>";
            echo "<div class='botoes'>";
                echo "<input type='submit' name='confirmar' value='Sim' class='atualizar'>";
                echo "<input type='submit' name='cancelar' value='Não' class='cancelar'>";
            echo "</div>";    
        echo "</form>";
    } else {
        echo "Paciente não encontrado.";
    }

    mysqli_close($con);
} else {
    echo "ID do paciente não especificado.";
}    
?>
<?php         
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
    include('../conexao.php');

    $id=$_POST["id"];                
    
    $query="DELETE FROM tb_cliente WHERE id=$id";

    $result=mysqli_query($con,$query);

    if ($result) {
        echo "Paciente exluido com sucesso!";
    } else {
        echo "ERRO ao excluir o paciente: ".mysqli_error($con);
    }

    mysqli_close($con);

    header("Location: consultaCliente.php");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
    header("Location: consultaCliente.php");
    exit;
}
?>