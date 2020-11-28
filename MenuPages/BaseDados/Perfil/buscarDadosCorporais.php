<?php

session_start();

$sessionName = $_SESSION["nome"];
$var = $_GET["var"];

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
    }
}

$sqlDadosCorporais = "SELECT peso, altura, massaMagra, massaGorda, massaHidrica, IMC FROM dadoscorporais WHERE idUtilizador=$idUser";
$resultDadosCorporais = mysqli_query($conn, $sqlDadosCorporais);

if ($resultDadosCorporais) {
    while ($row = mysqli_fetch_assoc($resultDadosCorporais)) {
        $peso = $row["peso"];
        $altura = $row["altura"];
        $mm = $row["massaMagra"];
        $mg = $row["massaGorda"];
        $mh = $row["massaHidrica"];
        $imc = $row["IMC"];

        if ($var == "peso")
            echo $peso;
        else if ($var == "altura")
            echo $altura;
        else if ($var == "mm")
            echo $mm;
        else if ($var == "mg")
            echo $mg;
        else if ($var == "mh")
            echo $mh;
        else if ($var == "imc")
            echo $imc;
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
