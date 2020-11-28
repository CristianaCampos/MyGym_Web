<?php

session_start();

$nome = $_POST["nomeCriar"];
$utilizador = $_POST["nomeUtilizadorCriar"];
$email = $_POST["emailCriar"];
$contacto = $_POST["contactoCriar"];
$passwordUser = $_POST["passCriar"];

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

$sql2 = "SELECT nome FROM utilizador WHERE nomeUtilizador='" . $utilizador . "'";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) == 0) {
    $sql = "INSERT INTO utilizador(nome, nomeUtilizador, email, contacto, pass) VALUES ('" . $nome . "', '" . $utilizador . "', '" . $email . "', '" . $contacto . "', '" . $passwordUser . "')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result2) == 0) {
        $_SESSION["nome"] = $nome;
        header("Location: ../../StartPage/startPage.php");
    } else {
        header("Location: ../../ErrorPages/Error.html");
    }
} else {
    header("Location: ../../ErrorPages/Error.html");
}

mysqli_close($conn);
