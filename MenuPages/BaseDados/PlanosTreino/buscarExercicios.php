<?php

session_start();

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

$sqlNomeExercicio = "SELECT nome FROM exercicio WHERE idUtilizador=" . $idUtilizador;
$resultNomeExercicio = mysqli_query($conn, $sqlNomeExercicio);

if ($resultNomeExercicio) {
    while ($row = mysqli_fetch_assoc($resultNomeExercicio)) {
        $exercicio = $row["nome"];
        echo '<option>' . $exercicio . '</option>';
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
