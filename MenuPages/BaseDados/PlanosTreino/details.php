<?php

$id = $_GET["id"];
$var = $_GET["var"];

$exercicios = '';

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

$exercicios = '<div class="row">
                <div class="col-sm-4"><b>Exercício</b></div>
                <div class="col-sm-4"><b>Séries</b></div>
                <div class="col-sm-4"><b>Repetições</b></div>
                </div>';

if ($var == "exercicio") {
    $sqlExercicio = "SELECT idExercicio, series, repeticoes FROM exerciciosplanotreino WHERE idPlanoTreino = $id";
    $resultExercicio = mysqli_query($conn, $sqlExercicio);
    if ($resultExercicio) {
        while ($rowExercicio = mysqli_fetch_assoc($resultExercicio)) {
            $idExercicio = $rowExercicio["idExercicio"];
            $series = $rowExercicio["series"];
            $repeticoes = $rowExercicio["repeticoes"];

            $sqlNomeExercicio = "SELECT nome FROM exercicio WHERE id = $idExercicio";
            $resultNomeExercicio = mysqli_query($conn, $sqlNomeExercicio);
            if ($resultNomeExercicio) {
                if ($rowNomeExercicio = mysqli_fetch_assoc($resultNomeExercicio)) {
                    $nomeExercicio = $rowNomeExercicio["nome"];
                }
            }
            $exercicios .= '<div class="row">
                                        <div class="col-sm-4">' . $nomeExercicio . '</div>
                                        <div class="col-sm-4">' . $series . '</div>
                                        <div class="col-sm-4">' . $repeticoes . '</div>
                                    </div>';
        }
        echo $exercicios;
    }
} else {
    $sql = "SELECT $var FROM planotreino WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            echo $row[$var];
        }
    }
}

mysqli_close($conn);
