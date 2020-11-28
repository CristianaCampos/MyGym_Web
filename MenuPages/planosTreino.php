<?php
session_start();
?>

<html>

<head>
    <title>My Gym</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/styles.css?v=1.7">
    <script src="https://kit.fontawesome.com/8d30e20f45.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../imgs/SVG/icon.svg">

    <script>
        var count = 1;

        function createSelects() {
            count++;
            document.getElementById("createSelect").innerHTML += '<div class="input-group mb-3"><select id="exercicio' + count + '" name="exercicio' + count + '" class="form-control"><option selected disabled>Escolhe...</option></select><input type="text" class="form-control" name="series" value="2" id="series' + count + '" placeholder="séries"><input type="text" value="12" class="form-control" name="reps" id="reps' + count + '" placeholder="reps"></div>';
            carregarExercicios();
        }

        function carregarExercicios() {
            document.getElementById("nomePlano").value = "teste";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("exercicio" + count).innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/buscarExercicios.php", true);
            xhttp.send();
        }

        function carregarPlanosTreino() {
            alert("olá");
        }

        function criarPlanoTreino() {
            var nomePlano = document.getElementById("nomePlano").value;
            var diaSemana = document.getElementById("diaSemana").value;
            var exercicios = new Array();
            var series = new Array();
            var reps = new Array();

            for (var i = 1; i <= count; i++) {
                exercicios[i] = document.getElementById("exercicio" + i).value;
                series[i] = document.getElementById("series" + i).value;
                reps[i] = document.getElementById("reps" + i).value;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/criarPlanoTreino.php?nomePlano=" + nomePlano + "&diaSemana=" + diaSemana + "&exercicios=" + exercicios + "&series=" + series + "&reps=" + reps, true);
            xhttp.send();
        }
    </script>
</head>

<body onload="carregarExercicios(); carregarPlanosTreino()">
    <?php
    include '../Navbar/menu.php'; ?>

    <div class="container" style="margin-top: 6%">
        <div class="row">
            <div class="col-sm-6">
                <h2>Planos de Treino</h2>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btnPlus float-right" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="container containerList mt-3">
            <div class="row">
                <div class="col-xl-4">
                    <div class="mt-3">Plano 1</div>
                </div>
                <div class="col-xl-4">
                    <div class="text-center mt-3">Dia Semana</div>
                </div>
                <div class="col-xl-4">
                    <div class="float-right">
                        <i class="fas fa-arrow-right btnArrow mt-3"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container containerList mt-3">
            <div class="row">
                <div class="col-xl-4">
                    <div class="mt-3">Plano 2</div>
                </div>
                <div class="col-xl-4">
                    <div class="text-center mt-3">Dia Semana</div>
                </div>
                <div class="col-xl-4">
                    <div class="float-right">
                        <i class="fas fa-arrow-right btnArrow mt-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Criar Plano de Treino</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="nomeAulaGrupo">Nome Plano Treino</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nomePlano" id="nomePlano" placeholder="nome plano treino">
                    </div>
                    <label for="diaSemana">Dia da Semana</label>
                    <div class="input-group mb-3">
                        <select id="diaSemana" name="diaSemana" class="form-control">
                            <option disabled>Escolhe...</option>
                            <option>Segunda-Feira</option>
                            <option selected>Terça-Feira</option>
                            <option>Quarta-Feira</option>
                            <option>Quinta-Feira</option>
                            <option>Sexta-Feira</option>
                            <option>Sábado</option>
                            <option>Domingo</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm">Exercícios</div>
                        <div class="col-sm">
                            <button type="button" class="btn float-right" onclick="createSelects()"><i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <select id="exercicio1" name="exercicio1" class="form-control">
                            <option selected disabled>Escolhe...</option>
                        </select>
                        <input type="text" class="form-control" value="2" name="series" id="series1" placeholder="séries">
                        <input type="text" class="form-control" value="12" name="reps" id="reps1" placeholder="reps">
                    </div>
                    <div class="input-group mb-3" id="createSelect">
                    </div>
                    <br><button type="submit" action="../../planosTreino.php" id="btnCriar" class="btn btnInicio btnIniciarSessao btn-lg w-100" onclick="criarPlanoTreino()">Criar</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../Navbar/footer.html'; ?>
</body>

</html>