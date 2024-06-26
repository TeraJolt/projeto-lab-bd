<?php
    // Criando estilo com css
    echo"
        <style>
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #ddedfd;
            }
            li{
                float: left;
            }
            li a, .dropbtn{
                display: inline-block;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            li a:hover, .dropdown:hover .dropbtn{
                background-color: #bbcbdb;
            }
            li.dropdown{
                display: inline-block;
            }
            .dropdown-content{
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }
            .dropdown-content a{
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }
            .dropdown-content a:hover{
                background-color: #f1f1f1;
            }
            .dropdown:hover .dropdown-content{
                display: block;
            }
            .title{
                display: flex;
                text-align: center;
                background-color: #778797;
                padding: 10px 50px;
            }
            .title a {
                color: #ffffff;
                text-decoration: none;
                font-family: Verdana;
                font-size: 30px;
                font-weight: bold;
            }
            .wrapper{
                position: fixed;
                top:0;
                left:0;
                width:100%;
            }
            .box{
                height: 6em;
            }
        </style>
        <div class='box'></div>";
        echo
        "<div class='wrapper'>
            <ul>
                <div class='title'><a href='../index.html'>Home</a></div>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn'>Cliente</a>
                    <div class='dropdown-content'>
                        <a href='../cliente/cadastrarCliente.php'>Cadastro</a>
                        <a href='../cliente/consultarCliente.php'>Consulta</a>
                    </div>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn'>Vendedor</a>
                    <div class='dropdown-content'>
                        <a href='../vendedor/cadastrarVendedor.php'>Cadastro</a>
                        <a href='../vendedor/consultarVendedor.php'>Consulta</a>
                    </div>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn'>Produto</a>
                    <div class='dropdown-content'>
                        <a href='../produto/cadastrarProduto.php'>Cadastro</a>
                        <a href='../produto/consultarProduto.php'>Consulta</a>
                    </div>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn'>Pedido</a>
                    <div class='dropdown-content'>
                        <a href='../pedido/cadastrarPedidov2.php'>Cadastro</a>
                        <a href='../pedido/consultarPedido.php'>Consulta</a>
                    </div>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn'>Forma de Pagamento</a>
                    <div class='dropdown-content'>
                        <a href='../formaPagamento/cadastrarFormaPagamento.php'>Cadastro</a>
                        <a href='../formaPagamento/consultarFormaPagamento.php'>Consulta</a>
                    </div>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn'>Relatórios</a>
                    <div class='dropdown-content'>
                        <a href='../relatorio/relatorioPedido.php'>Pedidos</a>
                        <a href='../relatorio/relatorioVendedores.php'>Vendedores</a>
                    </div>
                </li>
            </ul></div>";
        
?>