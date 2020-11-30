<?php

session_start();

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

$idUtilizador = getUserId($conn);

$sqlDadosExercicio = "SELECT id, nome, zonaMuscular FROM exercicio WHERE idUtilizador=" . $idUtilizador;
$resultDadosExercicio = mysqli_query($conn, $sqlDadosExercicio);

if ($resultDadosExercicio) {
    while ($row = mysqli_fetch_assoc($resultDadosExercicio)) {
        $id = $row["id"];
        $nome = $row["nome"];
        $zonaMuscular = $row["zonaMuscular"];
        echo
            '<div class="container containerList mt-3" id="' . $id . '" onclick="detailsNome(this.id)" data-toggle="modal" data-target="#myModalDetails"> 
                <div class="row">
                    <div class="col-xl-4">
                        <div class="mt-3">' . $nome . '</div> 
                    </div> 
                    <div class="col-xl-4">
                        <div class="text-center mt-3">' . $zonaMuscular . '</div>
                    </div> 
                    <div class="col-xl-4">
                        <div class="float-right">
                            <i id="' . $id . '" onclick="guardarID(this.id)" data-toggle="modal" data-target="#myModalDelete" class="fas fa-trash-alt btnArrow mt-3"></i> 
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
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

mysqli_close($conn);
