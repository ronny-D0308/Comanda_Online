<?php   
        session_start();

        $bdhost = 'localhost';
        $bdUsername = 'root';
        $bdPassword = '';
        $bdName = 'bdsecund';

        $conn = new mysqLi($bdhost, $bdUsername, $bdPassword, $bdName);

        if($conn -> connect_error) {
        die("Conexão falhou: ". $conn -> connect_error);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['usuario'];
            $pass = $_POST['senha'];
            

        $consul = "SELECT Nome, Senha FROM funcionarios WHERE Nome = ? ";
        
        $stmt = $conn->prepare($consul);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user, $pass);
        $stmt->fetch();

            if($stmt->num_rows > 0) {
                if($pass == "111") {
                    $SESSION["leggedin"] = true;
                    $SESSION["usuario"] = $user;
                    return header("location: Central_adm.php");

                } elseif ($pass == $_POST['senha']) {

                $SESSION["leggedin"] = true;
                $SESSION["usuario"] = $user;
                return header("location: Trailer_da_avenida.php");

            } else {
                echo "Senha inválida!";
            }
            
        } else {
            echo "Usuário inválido!";
        }
        $stmt->close();
    }
        $conn->close();
?>
