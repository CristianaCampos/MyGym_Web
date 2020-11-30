<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mygym";

$id = $_GET["id"];

// Efetua a ligação
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a ligação
if (!$conn) {
    die("Ligação falhou: " . mysqli_connect_error());
}

$idUtilizador = getUserId($conn);

echo $id;
$sqlDeleteExercicioPlano = "DELETE FROM exerciciosplanotreino WHERE idPlanoTreino=$id;";
$resultDeleteExercicioPlano = mysqli_query($conn, $sqlDeleteExercicioPlano);

if ($resultDeleteExercicioPlano) {
    $sqlDeletePlano = "DELETE FROM planotreino WHERE id=$id AND idUtilizador=$idUtilizador;";
    $resultDeletePlano = mysqli_query($conn, $sqlDeletePlano);
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
