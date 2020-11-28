<?php

session_start();

$nomePlano = $_GET["nomePlano"];
$diaSemana = $_GET["diaSemana"];

$exercicios = $_GET["exercicios"];
$series = $_GET["series"];
$reps = $_GET["reps"];

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

$exercicio = explode(",", $exercicios);
$serie = explode(",", $series);
$rep = explode(",", $reps);

$idUtilizador = getUserId($conn);

if (getPlanosTreino($conn, $nomePlano)) {
    if (mysqli_num_rows(getPlanosTreino($conn, $nomePlano)) == 0) {
        $sql = "INSERT INTO planotreino(nome, diaSemana, idUtilizador) VALUES ('" . $nomePlano . "', '" . $diaSemana . "', $idUtilizador)";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            $idPlano = getIdPlano($conn, $nomePlano);

            for ($i = 1; $i < count($exercicio); $i++) {

                $sql4 = "SELECT id FROM exercicio WHERE nome='" . $exercicio[$i] . "'";
                $result4 = mysqli_query($conn, $sql4);

                $idExercicio = 0;

                if ($result4) {
                    if ($row4 = mysqli_fetch_assoc($result4)) {
                        $idExercicio = $row4["id"];
                    }
                }

                $sql3 = "INSERT INTO exerciciosplanotreino(idExercicio, idPlanoTreino, series, repeticoes) VALUES (" . $idExercicio . ", " . $idPlano . ", " . $serie[$i] . ", " . $rep[$i] . ")";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3) {
                    // echo "sucesso!";
                    header("Location: ../../planosTreino.php");
                } else {
                    // echo "erro3!";
                    header("Location: ../../../ErrorPages/Error.html");
                }
            }
        } else {
            // echo "erro2!";
            header("Location: ../../../ErrorPages/Error.html");
        }
    } else {
        // echo "erro1!";
        header("Location: ../../../ErrorPages/Error.html");
    }
}

function getUserId($conn)
{
    $nome = $_SESSION["nome"];
    $idUser = 0;

    $queryUserId = "SELECT id FROM utilizador WHERE nome='" . $nome . "'";
    $resultUserId = mysqli_query($conn, $queryUserId);

    if ($resultUserId) {
        if ($rowUserId = mysqli_fetch_assoc($resultUserId)) {
            $idUser = $rowUserId["id"];
        }
    }

    return $idUser;
}

// RETURNS RESULT
function getPlanosTreino($conn, $nomePlano)
{
    $sql2 = "SELECT * FROM planotreino WHERE nome='" . $nomePlano . "'";
    $result2 = mysqli_query($conn, $sql2);

    return $result2;
}

function getIdPlano($conn, $nomePlano)
{
    $idPlanoTreino = 0;

    if (getPlanosTreino($conn, $nomePlano)) {
        if ($row = mysqli_fetch_assoc(getPlanosTreino($conn, $nomePlano))) {
            $idPlanoTreino = $row["id"];
        }
    }

    return $idPlanoTreino;
}

mysqli_close($conn);
