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

$sqlDadosPlano = "SELECT id, nome, diaSemana FROM planotreino WHERE idUtilizador=" . $idUtilizador;
$resultDadosPlano = mysqli_query($conn, $sqlDadosPlano);

if ($resultDadosPlano) {
    while ($row = mysqli_fetch_assoc($resultDadosPlano)) {
        $id = $row["id"];
        $nome = $row["nome"];
        $diaSemana = $row["diaSemana"];
        echo
            '<div class="container containerList mt-3" id="' . $id . '" onclick="detailsNome(this.id)" data-toggle="modal" data-target="#myModalDetails">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="mt-3">' . $nome . '</div> 
                    </div> 
                    <div class="col-xl-4">
                        <div class="text-center mt-3">' . $diaSemana . '</div>
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
