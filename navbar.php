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
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                text-align: center;
                background-color: #003366;
                color: #ffffff;
                padding: 10px 50px;
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
                height: 30px;
            }
            h1{
                margin:3em 0 0 0;
            }
        </style>";

    // Conteudo da Navbar
    echo
        "<div class='box'></div>
        <div class='wrapper'>
            <ul>
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
            </ul></div>";
?>