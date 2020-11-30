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
                disableInputsConta();
                carregarDadosConta();
            } else {
                document.getElementById(button).style.borderRight = "2px solid black";
                document.getElementById("buttonConta").style.borderRight = "1px solid white";
                document.getElementById("dadosCorporaisSelection").style.display = "block";
                document.getElementById("contaSelection").style.display = "none";
                disableInputsDadosCorporais();
                carregarDadosCorporais();
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
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosCorporais.php?var=peso", true);
            xhttp.send();
        }

        function carregarAltura() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("altura").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosCorporais.php?var=altura", true);
            xhttp.send();
        }

        function carregarMM() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mm").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosCorporais.php?var=mm", true);
            xhttp.send();
        }

        function carregarMG() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mg").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosCorporais.php?var=mg", true);
            xhttp.send();
        }

        function carregarMH() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mh").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosCorporais.php?var=mh", true);
            xhttp.send();
        }

        function carregarIMC() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("imc").value = this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/buscarDadosCorporais.php?var=imc", true);
            xhttp.send();
        }

        function carregarDadosConta() {
            carregarNome();
            carregarNomeUtilizador();
            carregarEmail();
            carregarContacto();
            carregarPassword();
        }

        function carregarDadosCorporais() {
            carregarNome();
            carregarNomeUtilizador();
            carregarPeso();
            carregarAltura();
            carregarMM();
            carregarMG();
            carregarMH();
            carregarIMC();
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
            document.getElementById("btnAtualizarDadosConta").disabled = false;
            document.getElementById("btnAtualizarDadosCorporais").disabled = false;
        }

        function disableInputsConta() {
            document.getElementById("nome").disabled = true;
            document.getElementById("email").disabled = true;
            document.getElementById("contacto").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("btnAtualizarDadosConta").disabled = true;
        }

        function disableInputsDadosCorporais() {
            document.getElementById("peso").disabled = true;
            document.getElementById("altura").disabled = true;
            document.getElementById("mg").disabled = true;
            document.getElementById("mm").disabled = true;
            document.getElementById("mh").disabled = true;
            document.getElementById("btnAtualizarDadosCorporais").disabled = true;
        }

        function atualizarDadosConta() {
            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var contacto = document.getElementById("contacto").value;
            var password = document.getElementById("password").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/atualizarDadosConta.php?nome=" + nome + "&email=" + email + "&contacto=" + contacto + "&password=" + password, true);
            xhttp.send();
            disableInputsConta();
        }

        function atualizarDadosCorporais() {
            var peso = document.getElementById("peso").value;
            var altura = document.getElementById("altura").value;
            var mm = document.getElementById("mm").value;
            var mg = document.getElementById("mg").value;
            var mh = document.getElementById("mh").value;
            var imc = document.getElementById("imc").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                }
            };
            xhttp.open("GET", "BaseDados/Perfil/atualizarDadosCorporais.php?peso=" + peso + "&altura=" + altura + "&mm=" + mm + "&mg=" + mg + "&mh=" + mh + "&imc=" + imc, true);
            xhttp.send();
            disableInputsDadosCorporais();
        }

        function calcularIMC() {
            var peso = document.getElementById("peso").value;
            var altura = document.getElementById("altura").value;
            var imc = 0;
            imc = peso / (altura * altura) * 10000;
            document.getElementById("imc").style.color = "white";


            if (imc < 18.5) {
                document.getElementById("imc").style.backgroundColor = "red";
                document.getElementById("imc").value = imc.toFixed(2) + " (baixo)";
            } else if (imc > 25) {
                document.getElementById("imc").style.backgroundColor = "red";
                document.getElementById("imc").value = imc.toFixed(2) + " (alto)";
            } else {
                document.getElementById("imc").style.backgroundColor = "green";
                document.getElementById("imc").value = imc.toFixed(2) + " (normal)";
            }

        }
    </script>
</head>

<body onload="setSelected('buttonDadosCorporais'); carregarDadosCorporais(); disableInputsConta(); disableInputsDadosCorporais()">
    <?php
    include '../Navbar/menu.php'; ?>

    <div class="container" style="margin-top: 6%">
        <div class="row">
            <div class="col-md-4">
                <h2 style="margin-bottom: 30px">Perfil</h2>
                <div type="button" class="text-left w-100" id="buttonDadosCorporais" onclick="setSelected(this.id)">
                    <i style="font-size: 20px" class="fas fa-weight pr-2"></i>
                    <label for="buttonDadosCorporais" style="cursor: hand" class="h6" onclick="disableInputsDadosCorporais()">Dados Corporais</label>
                </div>
                <br>
                <div type="button" class="text-left w-100" id="buttonConta" onclick="setSelected(this.id)">
                    <i style="font-size: 20px" class="fas fa-user pr-2"></i>
                    <label for="buttonConta" style="cursor: hand" class="h6" onclick="disableInputsConta()">Conta</label>
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
                <div id="dadosCorporaisSelection" style="display: none;">
                    <div class="row mt-4">
                        <div class="col-sm w-50">
                            <label>Peso (kg)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="peso" placeholder="peso">
                            </div>
                            <label>Altura (cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="altura" placeholder="altura">
                            </div>
                            <label>Massa Hídrica (%)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="mh" placeholder="massa hidrica">
                            </div>
                        </div>
                        <div class="col-sm">
                            <label>Massa Gorda (%)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="mg" placeholder="massa gorda">
                            </div>
                            <label>Massa Magra (kg)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="mm" placeholder="massa magra">
                            </div>
                            <label>Índice de Massa Corporal (IMC)</label>
                            <div class="input-group mb-3">
                                <input disabled type="text" class="form-control" id="imc" placeholder="IMC">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" onclick="calcularIMC(); atualizarDadosCorporais();" id="btnAtualizarDadosCorporais" class="btn btnPrincipal w-50">Atualizar</button>
                    </div>
                </div>
                <div id="contaSelection" style="display: none;">
                    <div class="row mt-4">
                        <div class="col-sm w-50">
                            <label>Nome</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nome" placeholder="nome">
                            </div>
                            <label>Email</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" id="email" placeholder="email">
                            </div>
                        </div>
                        <div class="col-sm">
                            <label>Contacto</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="contacto" placeholder="contacto">
                            </div>
                            <label>Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" placeholder="password">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" onclick="atualizarDadosConta()" id="btnAtualizarDadosConta" class="btn btnPrincipal w-50">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../Navbar/footer.html'; ?>
</body>

</html>