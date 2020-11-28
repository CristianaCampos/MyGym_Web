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

$sql2 = "SELECT id FROM utilizador WHERE nome='" . $sessionName . "'";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    $sql = "UPDATE utilizador
    SET nome = '$nome', email = '$email', contacto = '$contacto', pass = '$userPassword'
    WHERE nome = '$nomeUtilizador'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION["nome"] = $nome;
        header("Location: ../../perfil.php");
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}


mysqli_close($conn);
