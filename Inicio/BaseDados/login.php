<?php
session_start();

$utilizador = $_GET["nomeUtilizadorLogin"];
$passwordUser = $_GET["passLogin"];

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

$sql = "SELECT pass, nome FROM utilizador WHERE nomeUtilizador='" . $utilizador . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	if ($row = mysqli_fetch_assoc($result)) {
		$passwordDB = $row['pass'];
		$nome = $row['nome'];

		if ($passwordUser == $passwordDB) {
			session_start();
			$_SESSION["nome"] = $nome;
			header("Location: ../../StartPage/startPage.php");
		} else {
			header("Location: ../../ErrorPages/Error.html");
		}
	}
} else {
	header("Location: ../../ErrorPages/Error.html");
}

mysqli_close($conn);
