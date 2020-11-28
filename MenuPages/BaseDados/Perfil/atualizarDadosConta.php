<?php

session_start();

$sessionName = $_SESSION["nome"];

$nome = $_GET["nome"];
$email = $_GET["email"];
$contacto = $_GET["contacto"];
$userPassword = $_GET["password"];

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

if (mysqli_num_rows($resultIdUtilizador) > 0) {
    $sqlUpdateUtilizador = "UPDATE utilizador
    SET nome = '$nome', email = '$email', contacto = '$contacto', pass = '$userPassword'
    WHERE nome = '$nomeUtilizador'";
    $resultUpdateUtilizador = mysqli_query($conn, $sqlUpdateUtilizador);

    if ($resultUpdateUtilizador) {
        $_SESSION["nome"] = $nome;
        header("Location: ../../perfil.php");
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}


mysqli_close($conn);
