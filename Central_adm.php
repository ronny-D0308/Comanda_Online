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
    </style>

</head>

<body>

<!--LOCAL DE BUSCA DE INFOMAÇÕES DOS CLIENTES-->
    <h1>Área Administrativa</h1>
        <div class="conteiner_form">
            <form method="GET" action="">

                <input type="text" name="busca">
                
                <button type="submit">BUSCAR</button>
            </form>
        </div>



<!--PROCESSAMENTO DOS DADOS-->
<span class="conteiner_tabela">
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

                $comanda = "SELECT Nome, Garcon, Numero_mesa, Valor_comanda FROM cliente
        WHERE Nome LIKE '%$nome%'  ";

                $result = $conn->query($comanda);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Nome"]."</td><td>" . 
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
    
</body>
</html>