<?php

session_start();

$nomeExercicio = $_GET["nomeExercicio"];
$zonaMuscular = $_GET["zonaMuscular"];

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

$sqlIdExercicio = "SELECT id FROM exercicio WHERE nome='" . $nomeExercicio . "'";
$resultIdExercicio = mysqli_query($conn, $sqlIdExercicio);

if (mysqli_num_rows($resultIdExercicio) == 0) {
    $sqlInserirExercicio = "INSERT INTO exercicio(nome, zonaMuscular) VALUES ('" . $nomeExercicio . "', '" . $zonaMuscular . "')";
    $resultInserirExercicio = mysqli_query($conn, $sqlInserirExercicio);

    if (mysqli_num_rows($resultInserirExercicio) == 0) {
        header("Location: ../../exercicios.php");
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
