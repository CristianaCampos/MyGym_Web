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

$idUtilizador = getUserId($conn);

$sqlIdAula = "SELECT id FROM aulagrupo WHERE nome='" . $nomeAula . "' AND idUtilizador=" . $idUtilizador;
$resultIdAula = mysqli_query($conn, $sqlIdAula);

if (mysqli_num_rows($resultIdAula) == 0) {
    $sqlInserirAula = "INSERT INTO aulagrupo(nome, diaSemana, idUtilizador) VALUES ('" . $nomeAula . "', '" . $diaSemana . "', " . $idUtilizador . ")";
    $resultInserirAula = mysqli_query($conn, $sqlInserirAula);

    if ($resultInserirAula) {
        header("Location: ../../aulasGrupo.php");
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
