<?php

session_start();

$nome = $_POST["nomeExercicio"];
$zonaMuscular = $_POST["zonaMuscular"];

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

$sql2 = "SELECT id FROM exercicio WHERE nome='" . $nome . "'";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) == 0) {
    $sql = "INSERT INTO exercicio(nome, zonaMuscular) VALUES ('" . $nome . "', '" . $zonaMuscular . "')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result2) == 0) {
        header("Location: ../../exercicios.php");
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
