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
    <link rel="stylesheet" href="../Css/styles.css?v=2.0">
    <script src="https://kit.fontawesome.com/8d30e20f45.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../imgs/SVG/icon.svg">

    <script>
        var idPlano = 0;
        var count = 1;

        function resetInputs() {
            document.getElementById("nomePlano").value = "";
        }

        function detailsNome(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nome-modalDetails").innerHTML = this.responseText;
                    detailsDiaSemana(id);
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/details.php?id=" + id + "&var=nome", true);
            xhttp.send();
        }

        function detailsDiaSemana(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("diaSemana-modalDetails").innerHTML = this.responseText;
                    detailsExercicios(id);
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/details.php?id=" + id + "&var=diaSemana", true);
            xhttp.send();
        }

        function detailsExercicios(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("exercicio-modalDetails").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/details.php?id=" + id + "&var=exercicio", true);
            xhttp.send();
        }

        function createSelects() {
            count++;
            document.getElementById("createSelect").innerHTML += '<div class="input-group mb-3"><select id="exercicio' + count + '" name="exercicio' + count + '" class="form-control"><option selected disabled>Escolhe...</option></select><input type="text" class="form-control" name="series" value="2" id="series' + count + '" placeholder="séries"><input type="text" value="12" class="form-control" name="reps" id="reps' + count + '" placeholder="reps"></div>';
            carregarExercicios();
        }

        function carregarExercicios() {
            document.getElementById("nomePlano").value = "";

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
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listaPlanos").innerHTML = null;
                    document.getElementById("listaPlanos").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/carregarPlanosTreino.php", true);
            xhttp.send();
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
                    carregarPlanosTreino();
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/criarPlanoTreino.php?nomePlano=" + nomePlano + "&diaSemana=" + diaSemana + "&exercicios=" + exercicios + "&series=" + series + "&reps=" + reps, true);
            xhttp.send();
        }

        function apagarPlano() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    carregarPlanosTreino();
                }
            };
            xhttp.open("GET", "BaseDados/PlanosTreino/apagarPlanoTreino.php?id=" + idPlano, true);
            xhttp.send();
        }

        function guardarID(id) {
            idPlano = id;
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
                <button type="button" onclick="resetInputs()" class="btn btnPlus float-right" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div id="listaPlanos"></div>
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
                            <option selected disabled>Escolhe...</option>
                            <option>Segunda-Feira</option>
                            <option>Terça-Feira</option>
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
                        <input type="text" class="form-control" name="series" id="series1" placeholder="séries">
                        <input type="text" class="form-control" name="reps" id="reps1" placeholder="reps">
                    </div>
                    <div class="input-group mb-3" id="createSelect">
                    </div>
                    <br><button type="submit" onclick="criarPlanoTreino()" data-dismiss="modal" class="btn btnPrincipal btn-lg w-100">Criar</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="myModalDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Apagar Plano Treino</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Tem a certeza que pretende apagar este registo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="apagarPlano()">Sim</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Details -->
    <div id="myModalDetails" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalhes Plano Treino</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <b>Nome</b>
                    <div id="nome-modalDetails"></div>
                    <hr style="border-color: black;">
                    <b>Dia Semana</b>
                    <div id="diaSemana-modalDetails"></div>
                    <hr style="border-color: black;">
                    <div id="exercicio-modalDetails">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnClose" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../Navbar/footer.html'; ?>
</body>

</html>