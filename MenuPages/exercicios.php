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
        var idExercicio = 0;

        function resetInputs() {
            document.getElementById("nomeExercicio").value = "";
            document.getElementById("zonaMuscular").value = "";
        }

        function detailsNome(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nome-modalDetails").innerHTML = this.responseText;
                    detailsZonaMuscular(id);
                }
            };
            xhttp.open("GET", "BaseDados/Exercicios/details.php?id=" + id + "&var=nome", true);
            xhttp.send();
        }

        function detailsZonaMuscular(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("zonaMuscular-modalDetails").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Exercicios/details.php?id=" + id + "&var=zonaMuscular", true);
            xhttp.send();
        }

        function carregarExercicios() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listaExercicios").innerHTML = null;
                    document.getElementById("listaExercicios").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Exercicios/carregarExercicios.php", true);
            xhttp.send();
        }

        function criarExercicio() {
            var nomeExercicio = document.getElementById("nomeExercicio").value;
            var zonaMuscular = document.getElementById("zonaMuscular").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    carregarExercicios();
                }
            };
            xhttp.open("GET", "BaseDados/Exercicios/criarExercicio.php?nomeExercicio=" + nomeExercicio + "&zonaMuscular=" + zonaMuscular, true);
            xhttp.send();
        }

        function apagarExercicio() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    carregarExercicios();
                }
            };
            xhttp.open("GET", "BaseDados/Exercicios/apagarExercicio.php?id=" + idExercicio, true);
            xhttp.send();
        }

        function guardarID(id) {
            idExercicio = id;
        }
    </script>
</head>

<body onload="carregarExercicios()">
    <?php
    include '../Navbar/menu.php'; ?>

    <div class="container" style="margin-top: 7%">
        <div class="row">
            <div class="col-sm-6">
                <h2>Exercícios</h2>
            </div>
            <div class="col-sm-6">
                <button type="button" onclick="resetInputs()" class="btn btnPlus float-right" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div id="listaExercicios"></div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Criar Exercício</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="nomeAulaGrupo">Nome Exercício</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="nomeExercicio" placeholder="nome exercício">
                    </div>
                    <label for="zonaMuscular">Zona Muscular</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="zonaMuscular" placeholder="zona muscular">
                    </div>
                    <br><button type="submit" onclick="criarExercicio()" data-dismiss="modal" class="btn btnPrincipal btn-lg w-100">Criar</button>
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
                    <h4 class="modal-title">Apagar Exercício</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Tem a certeza que pretende apagar este registo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="apagarExercicio()">Sim</button>
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
                    <h4 class="modal-title">Detalhes Exercício</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <b>Nome</b>
                    <div id="nome-modalDetails"></div>
                    <hr style="border-color: black;">
                    <b>Zona Muscular</b>
                    <div id="zonaMuscular-modalDetails"></div>
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