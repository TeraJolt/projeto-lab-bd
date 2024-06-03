<?php 
    echo 
    "<form method='POST'>
    <table border='1' width='100%'>";
        include("../conexao.php");
        $query="SELECT * FROM tb_vendedor ORDER BY nome";
        $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
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
        while($reg = mysqli_fetch_array($resu)) {
            echo 
            "<tr>
                <td>".$reg['nome']."</td>
                <td>".$reg['endereco']."</td>
                <td>".$reg['cidade']."</td>
                <td>".$reg['estado']."</td>
                <td>".$reg['celular']."</td>
                <td>".$reg['email']."</td>
                <td>".$reg['perc_comissao']."%"."</td>
                <td width='10%'><table border='1' width='100%'><tr>
                    <td><a href='atualizarVendedor.php?id=".$reg['id']."'>Editar</td>
                    <td><a href='excluirVendedor.php?id=".$reg['id']."'>Excluir</td>
                </tr></table></td>
            </tr>";
        }          
    echo "</form>";
    mysqli_close($con);
?>