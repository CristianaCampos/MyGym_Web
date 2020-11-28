<?php

session_start();

$nomeAula = $_GET["nomeAula"];
$diaSemana = $_GET["diaSemana"];

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

$sqlIdAula = "SELECT id FROM aulagrupo WHERE nome='" . $nomeAula . "'";
$resultIdAula = mysqli_query($conn, $sqlIdAula);

if (mysqli_num_rows($resultIdAula) == 0) {
    $sqlInserirAula = "INSERT INTO aulagrupo(nome, diaSemana) VALUES ('" . $nomeAula . "', '" . $diaSemana . "')";
    $resultInserirAula = mysqli_query($conn, $sqlInserirAula);

    if (mysqli_num_rows($resultInserirAula) == 0) {
        header("Location: ../../aulasGrupo.php");
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
