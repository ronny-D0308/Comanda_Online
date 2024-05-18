<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de PHP e MySQL</title>
</head>
<body>

    <?php
    $bdhost = 'localhost';
    $bdUsername = 'root';
    $bdPassword = '';
    $bdName = 'bdsecund';

    $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Query para buscar os valores
    $sql = "SELECT * FROM cliente WHERE Nome_cliente == 'campo'"

    // Se houver resultados, exibir em uma tabela
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Garcon</th><th>Numero_mesa</th><th>Valor_comanda</th></tr>";
        // Saída de cada linha de dados
        while($row = $result->fetch_assoc()) {
            echo "<tr> <td>".$row["Nome"]."</td>
                       <td>".$row["Garcon"]."</td>
                       <td>".$row["Numero_mesa"]."</td>
                       <td>".$row["Valor_comanda"]."</td>
                 </tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados encontrados";
    }
    $conn->close();
    ?>

</body>
</html>
