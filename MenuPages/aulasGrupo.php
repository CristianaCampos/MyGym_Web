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
        var idAula = 0;

        function resetInputs() {
            document.getElementById("nomeAulaGrupo").value = "";
        }


        function detailsNome(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nome-modalDetails").innerHTML = this.responseText;
                    detailsDiaSemana(id);
                }
            };
            xhttp.open("GET", "BaseDados/AulasGrupo/details.php?id=" + id + "&var=nome", true);
            xhttp.send();
        }

        function detailsDiaSemana(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("diaSemana-modalDetails").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/AulasGrupo/details.php?id=" + id + "&var=diaSemana", true);
            xhttp.send();
        }

        function carregarAulasGrupo() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listaAulasGrupo").innerHTML = null;
                    document.getElementById("listaAulasGrupo").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/AulasGrupo/carregarAulasGrupo.php", true);
            xhttp.send();
        }

        function criarAulaGrupo() {
            var nomeAula = document.getElementById("nomeAulaGrupo").value;
            var diaSemana = document.getElementById("diaSemana").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    carregarAulasGrupo();
                }
            };
            xhttp.open("GET", "BaseDados/AulasGrupo/criarAulaGrupo.php?nomeAula=" + nomeAula + "&diaSemana=" + diaSemana, true);
            xhttp.send();
        }

        function apagarAulaGrupo() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    carregarAulasGrupo();
                }
            };
            xhttp.open("GET", "BaseDados/AulasGrupo/apagarAulaGrupo.php?id=" + idAula, true);
            xhttp.send();
        }

        function guardarID(id) {
            idAula = id;
        }
    </script>
</head>

<body onload="carregarAulasGrupo()">
    <?php
    include '../Navbar/menu.php'; ?>

    <div class="container" style="margin-top: 6%">
        <div class="row">
            <div class="col-sm-6">
                <h2>Aulas de Grupo</h2>
            </div>
            <div class="col-sm-6">
                <button type="button" onclick="resetInputs()" class="btn btnPlus float-right" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div id="listaAulasGrupo"></div>
    </div>

    <!-- Modal Create -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Criar Aula de Grupo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="nomeAulaGrupo">Nome Aula Grupo</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nomeAulaGrupo" id="nomeAulaGrupo" placeholder="nome aula grupo">
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
                    <br><button type="button" onclick="criarAulaGrupo()" data-dismiss="modal" class="btn btnPrincipal btn-lg w-100">Criar</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnClose" data-dismiss="modal">Fechar</button>
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
                    <h4 class="modal-title">Apagar Aula Grupo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Tem a certeza que pretende apagar este registo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="apagarAulaGrupo()">Sim</button>
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
                    <h4 class="modal-title">Detalhes Aula Grupo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <b>Nome</b>
                    <div id="nome-modalDetails"></div>
                    <hr style="border-color: black;">
                    <b>Dia Semana</b>
                    <div id="diaSemana-modalDetails"></div>
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