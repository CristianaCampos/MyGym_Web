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

$sql2 = "SELECT id FROM utilizador WHERE nome='" . $sessionName . "'";
$result2 = mysqli_query($conn, $sql2);

if ($result2) {
    if ($row2 = mysqli_fetch_assoc($result2)) {
        $idUser = $row2["id"];
    }
}

$sql = "SELECT peso, altura, massaMagra, massaGorda, massaHidrica FROM dadoscorporais WHERE idUtilizador=$idUser";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $peso = $row["peso"];
        $altura = $row["altura"];
        $mm = $row["massaMagra"];
        $mg = $row["massaGorda"];
        $mh = $row["massaHidrica"];

        if ($var == "peso")
            echo $peso;
        else if ($var == "altura")
            echo $altura;
        else if ($var == "mm")
            echo $mm;
        else if ($var == "mg")
            echo $mg;
        else if ($var == "mh")
            echo $mh;
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
