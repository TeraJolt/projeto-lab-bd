<?php
    include_once("conexao.php");

    $sql_vendedor="SELECT id, nome, perc_comissao FROM tb_vendedor ORDER BY id";
    $resultado=mysqli_query($con,$sql_vendedor) or die("Erro ao retornar dados");
    
    //Obtendo os dados dos pedidos por meio de um loop while
    $linha="";
    while($registro=mysqli_fetch_array($resultado)) {
        $id_vendedor=$registro['id'];

        //Obtendo os dados para o calculo das vendas e calculo da comissão
        $sql_pedidos="SELECT id FROM tb_pedido WHERE id_vendedor = $id_vendedor";
        $resultado2=mysqli_query($con,$sql_pedidos) or die("Erro ao retornar dados");

        $totVendido=0;        

        while($registro2=mysqli_fetch_array($resultado2)) {
            $id_pedido=$registro2['id'];
            $sql_itens="SELECT i.qtde, p.preco FROM tb_itens_pedido i 
            INNER JOIN tb_produto p ON i.id_produto = p.id 
            WHERE i.id_pedido = $id_pedido";

            $resultado3=mysqli_query($con,$sql_itens) or die("Erro ao retornar dados");

            while($registro3=mysqli_fetch_array($resultado3)) {
                $qtde=$registro3['qtde'];
                $preco=$registro3['preco'];
                $totVendido+= ($qtde*$preco);
            }
        }

        $comissao=$totVendido*$registro['perc_comissao']/100;

        $linha.="<tr><td>".$registro['id']."</td><td>".$registro['nome']."</td><td>";
        $linha.="R$ ".number_format($totVendido, 2, ',', '.')."</td><td>"."R$ ".number_format($comissao, 2, ',', '.')."</td></tr>";
            
    }

    //Referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

    //Include autoloader
    require_once("dompdf/autoload.inc.php");

    //Criando a Instancia
    $dompdf = new DOMPDF();

    //Carregando o HTML
    $dompdf->load_html('
        <h1 style="text-align: center;">Relatório de Pedidos </h1>
        <hr>
        <table width="100%">
            <tr>
                <td>Id</td>
                <td>Vendedor</td>
                <td>TotalVendido</td>
                <td>ComissãoRecebida</td>
            </tr>'.$linha.'</table>');

    //Define o tamanho do papel
    $dompdf->setPaper('A4', 'portrait');

    //Renderizar o HTML - converte o html para pdf
    $dompdf->render();

    //Exibindo a página
    $dompdf->stream(
        "relatorio_pedido.pdf",
        array (
            "Attachment" => False //Exibe PDF na tela, Para fazer o download direto alterar para true
        )
    );
?>