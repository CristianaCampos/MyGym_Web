<?php

$id = $_GET["id"];
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

$sql = "SELECT $var FROM exercicio WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        echo $row[$var];
    }
}

mysqli_close($conn);
