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
    <link rel="stylesheet" href="../Css/styles.css?v=1.5">
    <script src="https://kit.fontawesome.com/8d30e20f45.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../imgs/SVG/icon.svg">

    <script>
        function criarExercicio() {
            var nomeExercicio = document.getElementById("nomeExercicio").value;
            var zonaMuscular = document.getElementById("zonaMuscular").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Exercicios/criarExercicio.php?nomeExercicio=" + nomeExercicio + "&zonaMuscular=" + zonaMuscular, true);
            xhttp.send();
        }
    </script>
</head>

<body>
    <?php
    include '../Navbar/menu.php'; ?>

    <div class="container" style="margin-top: 6%">
        <div class="row">
            <div class="col-sm-6">
                <h2>Exercícios</h2>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btnPlus float-right" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="container containerList mt-3">
            <div class="row ">
                <div class="col-xl-4">
                    <div class="mt-3">Exercício 1</div>
                </div>
                <div class="col-xl-4">
                    <div class="text-center mt-3">Zona Muscular</div>
                </div>
                <div class="col-xl-4">
                    <div class="float-right">
                        <i class="fas fa-trash-alt btnArrow mt-3"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container containerList mt-3">
            <div class="row">
                <div class="col-xl-4">
                    <div class="mt-3">Exercício 2</div>
                </div>
                <div class="col-xl-4">
                    <div class="text-center mt-3">Zona Muscular</div>
                </div>
                <div class="col-xl-4">
                    <div class="float-right">
                        <i class="fas fa-trash-alt btnArrow mt-3"></i>
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
                    <br><button type="submit" onclick="criarExercicio()" class="btn btnPrincipal btn-lg w-100">Criar</button>
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