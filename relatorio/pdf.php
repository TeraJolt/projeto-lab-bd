<?php
    include_once("../conexao.php");
    $sql="SELECT p.id, p.data_ped, p.observacao, p.forma_pagto, p.prazo_entrega, c.nome AS cliente, v.nome AS vendedor, f.nome AS pagto FROM tb_pedido p 
    INNER JOIN tb_cliente c ON p.id_cliente = c.id 
    INNER JOIN tb_vendedor v ON p.id_vendedor = v.id
    INNER JOIN tb_forma_pagto f ON p.forma_pagto = f.id
    ORDER BY p.id";
    $resultado=mysqli_query($con,$sql) or die("Erro ao retornar dados");
    

    //Obtendo os dados dos pedidos por meio de um loop while
    $linha="";
    while($registro=mysqli_fetch_array($resultado)) {
        $id=$registro['id'];
        $linha.="<tr><th>DataPedido</th><th>Cliente</th><th>Observação</th><th>FormaPagamento</th><th>PrazoEntrega</th><th>Vendedor</th></tr>";
        $linha.="<tr align='center'><td>".$registro['data_ped']."</td><td>";
        $linha.=$registro['cliente']."</td><td>".$registro['observacao']."</td><td>";
        $linha.=$registro['pagto']."</td><td>".$registro['prazo_entrega']."</td><td>";
        $linha.=$registro['vendedor']."</td></tr><br>";

        //Obtendo os dados dos itens dos pedidos por meio de um loop while
        $sql2="SELECT i.id_item, i.id_pedido, i.id_produto, i.qtde, p.id, pr.nome AS produto, pr.preco FROM tb_itens_pedido i
        INNER JOIN tb_pedido p ON p.id = i.id_pedido
        INNER JOIN tb_produto pr ON pr.id = i.id_produto
        WHERE i.id_pedido = $id";
        $resultado2=mysqli_query($con,$sql2) or die("Erro ao retornar dados");
        $soma=0;
        while($registro2=mysqli_fetch_array($resultado2)) {
            $precoTot=$registro2['preco']*$registro2['qtde'];
            $soma+=$precoTot;
            $linha.="<tr align='center'><th>Produto</th><th>Qtde</th><th>Preço</th><th>Total</th></tr><tr align='center'><td>";
            $linha.=$registro2['produto']."</td><td>".$registro2['qtde']."</td><td>"."R$ ".$registro2['preco']."</td><td>"."R$ ".$precoTot."</td></tr><br>";
        }     
        $linha.="<tr><th>Total do pedido:</th><th>R$ ".$soma."</th></tr><tr><td colspan='6'><hr></td></tr>";  
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
        <table width="100%">'.$linha.'</table>');

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