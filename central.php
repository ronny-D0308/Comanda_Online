<?php
    $Nome = $_POST['nome_cliente'];
    $Garcon = $_POST['garcon'];
    $Mesa = $_POST['mesa'];
    $Valor = $_POST['valor'];

    $bdhost = 'localhost';
    $bdUsername = 'root';
    $bdPassword = '';
    $bdName = 'bdsecund';

    $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

    if($conn -> connect_error) {
    die("Conexão falhou: ". $conn -> connect_error);
    }

    $sql = $conn -> prepare("INSERT INTO cliente( Nome, Garcon, Numero_mesa, Valor_comanda) VALUES (
    '$Nome', '$Garcon', '$Mesa', '$Valor')");

    if($sql -> execute()) {
    echo "Envio concluido";

    }else{
    echo "Erro no envio". $sql->error;
    }

    $sql->close();
    $conn->close();

    header("location: Trailer_da_avenida.html");

?> 