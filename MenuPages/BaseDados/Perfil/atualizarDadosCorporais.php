<?php

session_start();

$sessionName = $_SESSION["nome"];

$peso = $_GET["peso"];
$altura = $_GET["altura"];
$mm = $_GET["mm"];
$mg = $_GET["mg"];
$mh = $_GET["mh"];
$imc = $_GET["imc"];

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

$sqlIdUtilizador = "SELECT id FROM utilizador WHERE nome='" . $sessionName . "'";
$resultIdUtilizador = mysqli_query($conn, $sqlIdUtilizador);

if ($resultIdUtilizador) {
    if ($rowIdUtilizador = mysqli_fetch_assoc($resultIdUtilizador)) {
        $idUser = $rowIdUtilizador["id"];

        $sqlIdDadosCorporais = "SELECT id FROM dadoscorporais WHERE idUtilizador= $idUser";
        $resultIdDadosCorporais = mysqli_query($conn, $sqlIdDadosCorporais);

        if (mysqli_num_rows($resultIdDadosCorporais) > 0) {
            $sqlUpdateDadosCorporais = "UPDATE dadoscorporais
            SET peso = $peso, altura = $altura, massaMagra = $mm, massaGorda = $mg, massaHidrica = $mh, imc = '$imc'
            WHERE idUtilizador = $idUser";
            $resultUpdateDadosCorporais = mysqli_query($conn, $sqlUpdateDadosCorporais);

            if ($resultUpdateDadosCorporais) {
                header("Location: ../../perfil.php");
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        } else {
            $sqlInserirDadosCorporais = "INSERT INTO dadoscorporais(idUtilizador, peso, altura, massaMagra, massaGorda, massaHidrica, IMC) VALUES ($idUser, $peso, $altura, $mm, $mg, $mh, '$imc')";
            $resultInserirDadosCorporais = mysqli_query($conn, $sqlInserirDadosCorporais);

            if ($resultInserirDadosCorporais) {
                header("Location: ../../perfil.php");
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        }
    }
}




mysqli_close($conn);
