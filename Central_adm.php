<?php   
        session_start();

        if(!isset($_SESSION["leggedin"]) || $_SESSION["leggedin"] !== true) {
            
        }

        $bdhost = 'localhost';
        $bdUsername = 'root';
        $bdPassword = '';
        $bdName = 'bdsecund';

        $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

        if($conn -> connect_error) {
        die("Conexão falhou: ". $conn -> connect_error);
        }

?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central</title>
    <link rel="stylesheet" href="style_Central.css" type="text/css">

<!--ESTILIZAÇÃO DA PÁGINA-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kreon:wght@300..700&display=swap');


        *{
            font-family: 'Kreon',sans-serif;
            margin: 0;
        }
        body{
            background-color:#da6c22;
        }

        h1{
            font-size: 50px;
            color: white;
            text-align: center;
            margin: 30px 0px 40px 0px;
            letter-spacing: 5px;
        }

        .conteiner_form{
            text-align: center;
        }
        .campo{
            height:40px;
            outline: none;
            padding-left: 10px;
            font-size: 20px;
        }
        .conteiner_tabela{
            display:flex;
            justify-content:center; 
            margin-top: 40px;  
        }
        .tabela{
            background-color: #CDC8B1;
            width:400px;
            text-align:left;
            border-radius:4px;
            padding:5px;
        }
        .coluna{
            font-size:20px;
        }
        form{
            display:flex;
            gap: 20px;
            justify-content:center;
        }
        .sessão{
            margin-bottom:300px;
        }
        #grafico{
            width: 700px;
            height:700px;
            margin:0 auto;
        }
        #printFrame{
            display:none;
        }
        #imprimir{
            background: transparent;
            border: none;
            
        }
        #butao_impressao{
            text-align:center;
            margin-top:20px;
        }
    </style>

</head>

<body>

<!--LOCAL DE BUSCA DE INFOMAÇÕES DOS CLIENTES-->

    <section class="sessão">

            <h1>Área Administrativa</h1>
                <div class="conteiner_form">
                    <form method="GET" action="">

                        <input class="campo" type="text" name="busca">
                        
                        <button type="submit"> <img src="imagens/lupa.png"> </button>
                    </form>
                </div>


        <!--PROCESSAMENTO DOS DADOS-->
            <span class="conteiner_tabela"  id="clientes">
                <?php
                    if(isset($_GET['busca'])) : ?>
                        <table class="tabela">
                            <tr>
                                <th class="coluna" >Nome</th>
                                <th class="coluna" >Garçon</th>
                                <th class="coluna" >Mesa</th>
                                <th class="coluna" >Valor</th>
                            </tr>
                            <?php
                            $nome = $_GET['busca'];

                            $comanda = "SELECT Nome_cliente, Garcon, Numero_mesa, Valor_comanda FROM cliente
                    WHERE Nome_cliente LIKE '%$nome%'  ";

                            $result = $conn->query($comanda);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Nome_cliente"]."</td><td>" . 
                                    $row["Garcon"]. "</td><td>"  . 
                                    $row["Numero_mesa"]. "</td><td>" .
                                    $row["Valor_comanda"]. "</td></tr>";
                        }
                            } else {
                                echo "<tr><td> 0 resultados </td></tr>";
                        }
                    
                    $conn->close();
                ?>

                </table>
                <?php endif;?>
            </span>
                
            <div id="butao_impressao">
                <iframe id="printFrame" name="printFrame"> </iframe>

                    <button type="submit" id="imprimir" onClick="impressao()"> <img src="imagens/impressora.png"> </button>

                        <script>
                            function impressao() {
                                var tabela = document.getElementById('clientes').innerHTML;
                                var print =  document.getElementById('printFrame').contentWindow;

                                printFrame.document.open();

                                printFrame.document.write('<html><head><title>Print</title></head><body>' + tabela +'</body></html>');

                                print.document.close();
                                print.focus();
                                print.print();
                            }
                    </script>
                </div>
    </section>



<!--LOCAL DE BUSCA DE COMANDAS PENDENTES-->

    <section class="sessão">
        <h1>Comandas pendentes</h1>
            <div class="conteiner_form">
                        <form method="GET" action="">

                            <input class="campo" type="text" name="buscaVale">
                            
                            <button type="submit"> <img src="imagens/lupa.png"> </button>
                        </form>
            </div>
            
            <span class="conteiner_tabela">
            <?php
                    if(isset($_GET['buscaVale'])) : ?>
                        <table class="tabela">
                            <tr>
                                <th class="coluna" >Nome</th>
                                <th class="coluna" >Garçon</th>
                                <th class="coluna" >Data</th>
                                <th class="coluna" >Valor</th>
                            </tr>
                            <?php
                            $nome = $_GET['buscaVale'];

                            $comanda = "SELECT Nome_cliente, Garcon, Valor_comanda, Data_compra FROM vale
                    WHERE Nome_cliente LIKE '%$nome%'  ";

                            $result = $conn->query($comanda);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Nome_cliente"]."</td><td>" . 
                                    $row["Garcon"]. "</td><td>"  . 
                                    $row["Data_compra"]. "</td><td>" .
                                    $row["Valor_comanda"]. "</td></tr>";
                        }
                            } else {
                                echo "<tr><td> 0 resultados </td></tr>";
                        }
                    
                 
                ?>

                </table>
                <?php endif;?>

            </span>
            
            <div class="butoes">
                <button id="excluir" name="excluir"> EXCLUIR </button>
                <button id="alterar" name="excluir"> ALTERAR </button>
                <button></button>
            </div>
    </section>
    

<!--LOCAL DO GRÁFICO DE ATUALIDADES DA EMPRESA-->

    <section class="sessão">
                <?php
                    $bdhost = 'localhost';
                    $bdUsername = 'root';
                    $bdPassword = '';
                    $bdName = 'bdsecund';
            
                    $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);
            
                    if($conn -> connect_error) {
                    die("Conexão falhou: ". $conn -> connect_error);
                    }

                    $comanda = "SELECT SUM(Valor_comanda) AS total FROM vale";

                    $result = $conn->query($comanda);

                    $total = [];
                    $clientes = [];

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $total[] = $row['total'];
                        }
                    } else {
                        echo '0 resultado';
                    }
                    
                    $conn->close();

                ?>

    </section>
</body>
</html>
