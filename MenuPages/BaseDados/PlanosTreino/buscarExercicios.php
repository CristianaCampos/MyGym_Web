<?php

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

$sql = "SELECT nome FROM exercicio";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $exercicio = $row["nome"];
        echo '<option selected>' . $exercicio . '</option>';
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
