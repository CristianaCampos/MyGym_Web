<?php

session_start();

$sessionName = $_SESSION["nome"];
$var = $_GET["var"];

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

$sql = "SELECT nome, nomeUtilizador, email, contacto, pass FROM utilizador WHERE nome='$sessionName'";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nome = $row["nome"];
        $nomeUtilizador = $row["nomeUtilizador"];
        $email = $row["email"];
        $contacto = $row["contacto"];
        $pass = $row["pass"];

        if ($var == "nome")
            echo $nome;
        else if ($var == "nomeUtilizador")
            echo $nomeUtilizador;
        else if ($var == "email")
            echo $email;
        else if ($var == "contacto")
            echo $contacto;
        else if ($var == "pass")
            echo $pass;
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
