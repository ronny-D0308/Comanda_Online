<?php 
/*
        $bdhost = 'localhost';
        $bdUsername = 'root';
        $bdPassword = '';
        $bdName = 'bdsecund';

        $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

        if($conn -> connect_error) {
        die("Conexão falhou: ". $conn -> connect_error);
        }
*/
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
        .container {
           display: flex;
           justify-content: center;
           align-items: center;
        }
        .menu {
           position: relative;
           width: 60px;
           height: 60px;
           display: flex;
           overflow: hidden;
           justify-content: space-evenly;
           align-items: center;
           border-radius: 50px;
           box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .menu div {
           padding-left: 10px;
        }
        .menu:hover {
           width: 340px;
           transition-duration: 2s;
        }
        a {
            text-decoration: none;
            font-size: 20px;
            color: black;
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

    <div class=″container″>
        <div class="menu">

            <div class=″icon″><svg class="svg-profile" xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
width="40px" fill="#000000"><path d="M480-480q-66 0-113-47t-47-113q0-66
47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34
17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5
43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56
0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0
56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5
56.5T480-560Zm0-80Zm0 400Z" /></svg>
            </div>

                <div class=″icon″> <a href="estoque.php"> Estoque </a> </div>

                <div class=″icon″> <a href="#"> Home </a> </div>

            </div>
        </div>
            <h1 class="title">Trailer da Avenida</h1>

            <h3>Área Administrativa</h3>

            <div class="conteiner-table">

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
