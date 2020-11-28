<?php

session_start();

$sessionName = $_SESSION["nome"];

$peso = $_GET["peso"];
$altura = $_GET["altura"];
$mm = $_GET["mm"];
$mg = $_GET["mg"];
$mh = $_GET["mh"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mygym";

// Efetua a ligação
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a ligação
if (!$conn) {
    die("Ligação falhou: " . mysqli_connect_error());
}

$sql = "SELECT id FROM utilizador WHERE nome='" . $sessionName . "'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        $idUser = $row["id"];

        $sql2 = "SELECT id FROM dadoscorporais WHERE idUtilizador= $idUser";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            $sql3 = "UPDATE dadoscorporais
            SET peso = $peso, altura = $email, massaMagra = $mm, massaGorda = $mg, massaHidrica = $mh
            WHERE idUtilizador = $idUser";
            $result3 = mysqli_query($conn, $sql3);

            if ($result3) {
                header("Location: ../../perfil.php");
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        } else {
            $sql3 = "INSERT INTO dadoscorporais(idUtilizador, peso, altura, massaMagra, massaGorda, massaHidrica) VALUES ($idUser, $peso, $altura, $mm, $mg, $mh)";
            $result3 = mysqli_query($conn, $sql3);

            if ($result3) {
                header("Location: ../../perfil.php");
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        }
    }
}




mysqli_close($conn);
