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

$idUtilizador = getUserId($conn);

$sqlIdExercicio = "SELECT id FROM exercicio WHERE nome='" . $nomeExercicio . "' AND idUtilizador= $idUtilizador";
$resultIdExercicio = mysqli_query($conn, $sqlIdExercicio);

if (mysqli_num_rows($resultIdExercicio) == 0) {
    $sqlInserirExercicio = "INSERT INTO exercicio(nome, zonaMuscular, idUtilizador) VALUES ('" . $nomeExercicio . "', '" . $zonaMuscular . "', " . $idUtilizador . ")";
    $resultInserirExercicio = mysqli_query($conn, $sqlInserirExercicio);

    if (mysqli_num_rows($resultInserirExercicio) == 0) {
        header("Location: ../../exercicios.php");
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

function getUserId($conn)
{
    $nome = $_SESSION["nome"];
    $idUser = 0;

    $queryUserId = "SELECT id FROM utilizador WHERE nome='" . $nome . "'";
    $resultUserId = mysqli_query($conn, $queryUserId);

    if ($resultUserId) {
        if ($rowUserId = mysqli_fetch_assoc($resultUserId)) {
            $idUser = $rowUserId["id"];
        }
    }

    return $idUser;
}

mysqli_close($conn);
