<?php 
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

        .title{
            font-size: 50px;
            color: white;
            text-align: center;
            margin: 30px 0px 40px 0px;
            letter-spacing: 5px;
        }
        h3{
            font-size:40px;
            color: white;
            text-align: center;
            margin: 30px 0px 40px 0px;
            letter-spacing: 5px;
        }
        
        .conteiner-tabela{
            margin: 0 auto;
        }
        .sessão{
            margin-bottom:300px;
        }
        #imprimir{
            text-align:center;
            margin:auto 0;
            margin-top:30px;
            cursor: pointer;
        }
        .butoes{
            text-align:center;
            margin-top:30px;
        }
        .conteiner-table{
            display:flex;
            justify-content:center; 
            margin-top: 40px;
        }
        .table{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
            margin: 0 auto;
            width: 600px;
            text-align: center;
            font-size:20px;
        }
        table th{
            color: white;
            text-decoration: underline;
        }
        .acoes{
            text-decoration:none;
            color: white;
            margin-left:10px;
            font-weight: bold;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            #tabela, #tabela * {
                visibility: visible;
            }
            #tabela{
                position: fixed;
                left:0;
                top:0;
            }
        }
        
    </style>

</head>

<body>

<!--LOCAL DE BUSCA DE INFOMAÇÕES DOS CLIENTES-->

    <section class="sessão">
            <h1 class="title">Trailer da Avenida</h1>

            <h3>Área Administrativa</h3>

            <div class="conteiner-table">
                <?php
                    $bdhost = 'localhost';
                    $bdUsername = 'root';
                    $bdPassword = '';
                    $bdName = 'bdsecund';
                    
                    $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);
                    
                    if($conn -> connect_error) {
                    die("Conexão falhou: ". $conn -> connect_error);
                    }
                    
                    $sql = "SELECT Nome_cliente, Garcon, Valor_comanda, Data_compra FROM cliente";
                    $result = $conn->query($sql);
                ?>

                    <table class="table" id="tabela">
                        <thead>
                            <tr>
                                <th class="coluna" >Nome</th>
                                <th class="coluna" >Garçon</th>
                                <th class="coluna" >Data</th>
                                <th class="coluna" >Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    
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

                            $conn->close();

                            ?>
                        </tbody>
                    </table>
                </div>

            <div id="imprimir">
                <button onclick="imprimir()"> IMPRIMIR COMANDA </button>
            </div>

            <script>
                function imprimir() {
                    window.print();
                }
            </script>
    </section>



<!--LOCAL DE BUSCA DE COMANDAS PENDENTES-->

    <section class="sessão">
        <h1 class="title">Comandas pendentes</h1>
               
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $bdname = "bdsecund";

                    $conn = new mysqli( $servername, $username, $password, $bdname);

                    if($conn->connect_error) {
                        die("Erro na conexão". $conn->connect_error);
                    }

                    $sql = "SELECT Nome_cliente, Garcon, Valor_comanda, Data_compra, Id FROM vale";
                    $result = $conn->query($sql); 
                ?>

            <div class="container-tabela">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="coluna" >Nome</th>
                            <th class="coluna" >Garçon</th>
                            <th class="coluna" >Data</th>
                            <th class="coluna" >Valor</th>
                            <th class="coluna" >Id</th>
                            <th class="coluna" >...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row['Nome_cliente']."</td>";
                                    echo "<td>".$row['Garcon']."</td>";
                                    echo "<td>".$row['Data_compra']."</td>";
                                    echo "<td>".$row['Valor_comanda']."</td>";
                                    echo "<td>".$row['Id']."</td>";
                                    echo "<td>
                                        <a class='acoes' id='Editar' href='edit.php?Id=$row[Id]' title='Editar'> EDITAR </a>
                
                                        <a class='acoes' id='Deletar' href='delete.php?Id=$row[Id]' title='Deletar'> DELETAR </a>
                                            </td>";
                                    echo "</tr>";
                                    }
                            } else {
                                    echo "<tr><td> 0 resultados </td></tr>";
                            }

                            $conn->close();

                        ?>
                    </tbody>
                </table>
            </div>

    </section>
    

<!--LOCAL DO GRÁFICO DE ATUALIDADES DA EMPRESA-->
</body>
</html>
