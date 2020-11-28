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
        function setSelected(button) {
            if (button == "buttonConta") {
                document.getElementById(button).style.borderRight = "2px solid black";
                document.getElementById("buttonDadosCorporais").style.borderRight = "1px solid white";
                document.getElementById("contaSelection").style.display = "block";
                document.getElementById("dadosCorporaisSelection").style.display = "none";
            } else {
                document.getElementById(button).style.borderRight = "2px solid black";
                document.getElementById("buttonConta").style.borderRight = "1px solid white";
                document.getElementById("dadosCorporaisSelection").style.display = "block";
                document.getElementById("contaSelection").style.display = "none";
            }
        }

        function carregarNome() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nome").value = this.responseText;
                    document.getElementById("nomePrincipal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=nome", true);
            xhttp.send();
        }

        function carregarNomeUtilizador() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nomeUtilizadorPrincipal").innerHTML = "@" + this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=nomeUtilizador", true);
            xhttp.send();
        }

        function carregarEmail() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("email").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=email", true);
            xhttp.send();
        }

        function carregarContacto() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("contacto").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=contacto", true);
            xhttp.send();
        }

        function carregarPassword() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("password").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=pass", true);
            xhttp.send();
        }

        function carregarPeso() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("peso").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=peso", true);
            xhttp.send();
        }

        function carregarAltura() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("altura").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=altura", true);
            xhttp.send();
        }

        function carregarMM() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mm").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=mm", true);
            xhttp.send();
        }

        function carregarMG() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mg").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=mg", true);
            xhttp.send();
        }

        function carregarMH() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mh").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosConta.php?var=mh", true);
            xhttp.send();
        }

        function carregarTodos() {
            carregarNome();
            carregarNomeUtilizador();
            carregarEmail();
            carregarContacto();
            carregarPassword();
            carregarPeso();
            carregarAltura();
            carregarMM();
            carregarMG();
            carregarMH();
        }

        function enableInputs() {
            document.getElementById("nome").disabled = false;
            document.getElementById("email").disabled = false;
            document.getElementById("contacto").disabled = false;
            document.getElementById("password").disabled = false;
            document.getElementById("peso").disabled = false;
            document.getElementById("altura").disabled = false;
            document.getElementById("mg").disabled = false;
            document.getElementById("mm").disabled = false;
            document.getElementById("mh").disabled = false;
            document.getElementById("btnAtualizar").disabled = false;
        }

        function disableInputsConta() {
            document.getElementById("nome").disabled = true;
            document.getElementById("email").disabled = true;
            document.getElementById("contacto").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("btnAtualizar").disabled = true;
        }

        function disableInputsDadosCorporais() {
            document.getElementById("peso").disabled = true;
            document.getElementById("altura").disabled = true;
            document.getElementById("mg").disabled = true;
            document.getElementById("mm").disabled = true;
            document.getElementById("mh").disabled = true;
            document.getElementById("btnAtualizar").disabled = true;
        }
    </script>
</head>

<body onload="setSelected('buttonConta'); carregarTodos(); disableInputsConta();">
    <?php
    include '../Navbar/menu.php'; ?>

    <div class="container" style="margin-top: 6%">
        <div class="row">
            <div class="col-md-4">
                <h2 style="margin-bottom: 30px">Perfil</h2>
                <div type="button" class="text-left w-100" id="buttonConta" onclick="setSelected(this.id)">
                    <i style="font-size: 20px" class="fas fa-user pr-2"></i>
                    <label for="buttonDadosCorporais" style="cursor: hand" class="h6" onclick="disableInputsConta()">Conta</label>
                </div>
                <br>
                <div type="button" class="text-left w-100" id="buttonDadosCorporais" onclick="setSelected(this.id)">
                    <i style="font-size: 20px" class="fas fa-weight pr-2"></i>
                    <label for="buttonDadosCorporais" style="cursor: hand" class="h6" onclick="disableInputsDadosCorporais()">Dados Corporais</label>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="../imgs/SVG/UtilizadorIcon.svg" class="img-fluid" />
                    </div>
                    <div class="col-sm-10 mt-4">
                        <label id="nomePrincipal">meunome</label><button class="btn" onclick="enableInputs()"><i class="fas fa-edit"></i></button><br><label id="nomeUtilizadorPrincipal" class="text-muted">nomeutilizador</label>
                    </div>
                </div>
                <div id="contaSelection" style="display: none;">
                    <form method="POST" action="BaseDados/Perfil/atualizarDadosConta.php">
                        <div class="row mt-4">
                            <div class="col-sm w-50">
                                <label>Nome</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="nome">
                                </div>
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email">
                                </div>
                            </div>
                            <div class="col-sm">
                                <label>Contacto</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="contacto" name="contacto" placeholder="contacto">
                                </div>
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" id="btnAtualizar" class="btn btnInicio btnIniciarSessao w-50">Atualizar</button>
                        </div>
                    </form>
                </div>
                <div id="dadosCorporaisSelection" style="display: none;">
                    <form method="POST" action="BaseDados/Perfil/atualizarDadosCorporais.php">
                        <div class="row mt-4">
                            <div class="col-sm w-50">
                                <label>Peso (kg)</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="peso" name="peso" placeholder="peso">
                                </div>
                                <label>Altura (cm)</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="altura" name="altura" placeholder="altura">
                                </div>
                                <label>Massa Hídrica</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="mh" name="mh" placeholder="massa hidrica">
                                </div>
                            </div>
                            <div class="col-sm">
                                <label>Massa Gorda</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="mg" name="mg" placeholder="massa gorda">
                                </div>
                                <label>Massa Magra</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="mm" name="mm" placeholder="massa magra">
                                </div>
                                <label>Índice de Massa Corporal</label>
                                <div class="input-group mb-3">
                                    <input disabled type="text" class="form-control" id="imc" name="imc" placeholder="IMC">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" id="btnAtualizar" class="btn btnInicio btnIniciarSessao w-50">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../Navbar/footer.html'; ?>
</body>

</html>