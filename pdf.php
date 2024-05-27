<?php
    include_once("conexao.php");
    $sql="SELECT * FROM tb_pedido p INNER JOIN tb_itens_pedido i ON p.id = i.id_pedido ORDER BY p.id";
    $resultado=mysqli_query($con,$sql) or die("Erro ao retornar dados");

    //Obtendo os dados por meio de um loop while
    $linha="";
    while($registro=mysqli_fetch_array($resultado)) {
        $linha.="<tr><td>".$registro['id']."</td><td>".$registro['data_ped']."</td><td>";
        $linha.=$registro['id_cliente']."</td><td>".$registro['observacao']."</td><td>";
        $linha.=$registro['forma_pagto']."</td><td>".$registro['prazo_entrega']."</td><td>";
        $linha.=$registro['id_vendedor']."</td></tr><br>";
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
                <td>Id</td><td>DataPedido</td><td>IdCliente</td><td>Observação</td>
                <td>FormaPagamento</td><td>PrazoEntrega</td><td>IdVendedor</td>
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