<?php

//INFORMAÇÕES DA COMANDA
    $Nome = $_POST['nome_cliente'];
    $Garcon = $_POST['garcon'];
    $Mesa = $_POST['mesa'];

//CALCULO DOS PRODUTOS
    $E1 = intval($_POST['E1']) * 5;
    $E2 = intval($_POST['E2']) * 5;
    $E3 = intval($_POST['E3']) * 5;
    $E4 = intval($_POST['E4']) * 5;
    $E5 = intval($_POST['E5']) * 5;
    $E6 = intval($_POST['E6']) * 5;
    $E7 = intval($_POST['E7']) * 5;
    $E8 = intval($_POST['E8']) * 8;
    $E9 = intval($_POST['E9']) * 15;

    $B1 = intval($_POST['B1']);
    $B2 = intval($_POST['B2']);
    $B3 = intval($_POST['B3']);
    $B4 = intval($_POST['B4']);
    $B5 = intval($_POST['B5']);
    $B6 = intval($_POST['B6']);
    $B7 = intval($_POST['B7']);
    $B08 = intval($_POST['B08']);
    $B9 = intval($_POST['B9']);
    $B10 = intval($_POST['B10']);
    $B11 = intval($_POST['B11']);
    $B12 = intval($_POST['B12']);
    $B13 = intval($_POST['B13']);
    $B14 = intval($_POST['B14']);
    $B15 = intval($_POST['B15']);
    $B16 = intval($_POST['B16']);
    $B17 = intval($_POST['B17']);
    $B18 = intval($_POST['B18']);
    $B19 = intval($_POST['B19']);
    $B20 = intval($_POST['B20']);
    $B21 = intval($_POST['B21']);

    $W1 = intval($_POST['W1']);
    $W2 = intval($_POST['W2']);
    $W3 = intval($_POST['W3']);
    $W4 = intval($_POST['W4']);
    $W5 = intval($_POST['W5']);
    $W6 = intval($_POST['W6']);
    $W7 = intval($_POST['W7']);
    $W8 = intval($_POST['W8']);
    $W9 = intval($_POST['W9']);
    $W10 = intval($_POST['W10']);

    $A1 = intval($_POST['A1']);
    $A2 = intval($_POST['A2']);

    $P1 = intval($_POST['P1']);
    $P2 = intval($_POST['P2']);

    $Espetos = ($E1 + $E2) + ($E3 + $E4) + ($E5 +$E6) + ($E7 + $E8) + ($E9);

    $Bebidas = ($B1 * 8 ) + ($B2 * 13) + ($B3 * 7) + ($B4 * 3) + ($B5 * 5) + ($B6 * 2) + ($B7 * 3) + ($B08 * 2) +
			   ($B9 * 5) + ($B10 * 17) + ($B11 * 12) + ($B12 * 10)+ ($B13 * 10) + ($B14 * 8) + ($B15 * 8) + ($B16 * 9) +
			   ($B17 * 10) + ($B18 * 10)+ ($B19 * 10) + ($B20 * 5) + ($B21 * 5);

    $Whisky = ($W1 * 10) + ($W2 * 15) + ($W3 * 7) + ($W4 * 8) + ($W5 * 12) + ($W6 * 18) + ($W7 * 2) + ($W8 * 2) +
              ($W9 * 4) + ($W10 * 4);

    $Acomp = ($A1 * 4) + ($A2 * 5);

    $Petisco = ($P1 * 14) + ($P2 * 14);

    $calculo_total = $Espetos + $Bebidas + $Whisky + $Petisco;

    $bdhost = 'localhost';
    $bdUsername = 'root';
    $bdPassword = '';
    $bdName = 'bdsecund';

    $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

    if($conn -> connect_error) {
    die("Conexão falhou: ". $conn -> connect_error);
    }

    $sql = $conn -> prepare("INSERT INTO cliente( Nome_cliente, Garcon, Numero_mesa, Valor_comanda) VALUES (
    '$Nome', '$Garcon', '$Mesa', '$calculo_total')");

    if($sql -> execute()) {
    echo "Envio concluido";

    }else{
    echo "Erro no envio". $sql->error;
    }

    $sql->close();
    $conn->close();

    header("location: Trailer_da_avenida.php");

?> 
