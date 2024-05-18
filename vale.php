<?php
    $Nome = $_POST['nome_cliente'];
    $Garcon = $_POST['nome_garcon'];
    $Valor = $_POST['valor'];

    $bdhost = 'localhost';
    $bdUsername = 'root';
    $bdPassword = '';
    $bdName = 'bancovale';

    $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

    if($conn -> connect_error) {
    die("Conexão falhou: ". $conn -> connect_error);
    }

    $sql = $conn -> prepare("INSERT INTO clientes( Nome_cliente, Valor_comanda, Garcon ) VALUES (
    '$Nome', '$Valor', '$Garcon')");

    if($sql -> execute()) {
    echo "Envio concluido";

    }else{
    echo "Erro no envio". $sql->error;
    }

    $sql->close();
    $conn->close();

    header("location: Trailer_da_avenida.html");

?> 