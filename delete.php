<?php
if(!empty($_GET['Id'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "bdsecund";

    $conn = new mysqli( $servername, $username, $password, $bdname);

    if($conn->connect_error) {
        die("Erro na conexão". $conn->connect_error);
    }

    $id = $_GET['Id'];

    $consul = "SELECT * FROM vale WHERE Id = $id";

    $result = $conn->query($consul);

    if($result->num_rows > 0) {
        $consulDelete = "DELETE FROM vale WHERE Id = $id";
        $resultDelete = $conn->query($consulDelete);
    }
    header('Location: Central_adm.php');
}
?>