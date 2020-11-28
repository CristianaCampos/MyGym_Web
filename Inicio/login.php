<html>

<head>
    <title>My Gym</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/styles.css?v=1.0">
    <script src="https://kit.fontawesome.com/8d30e20f45.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../imgs/SVG/icon.svg">

    <script>
        function mostrarRegisto() {
            document.getElementById("registarConta").style.display = "block";
            document.getElementById("beforeRegistarConta").style.display = "none";

            //caixas disable
            document.getElementById("nomeUtilizadorLogin").disabled = "false";
            document.getElementById("passwordLogin").disabled = "false";
            document.getElementById("btnIniciarSessao").disabled = "false";
        }
    </script>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #b72727">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../imgs/SVG/icon-branco.svg" height="35" /></a>
            <!-- <div class="float-right">
                <a class="nav-item nav-link" href="login.php"><img src="../imgs/PNG/utilizadorIcon.png" width="30" /></a>
            </div> -->
        </div>
    </nav>

    <div class="container" style="margin-top:2%;">
        <div class="row">
            <div class="col-sm">
                <form method="GET" action="BaseDados/login.php" role="login">
                    <h5><b>Já estás registado? Inicia Sessão</b></h5><br>
                    <label for="exampleNomeUtilizadorLogin">Nome Utilizador</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nomeUtilizadorLogin" id="nomeUtilizadorLogin" placeholder="nome utilizador">
                    </div>
                    <label for="examplePasswordLogin">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="passLogin" id="passwordLogin" placeholder="password">
                    </div>
                    <br><button type="submit" action="../StartPage/startPage.php" id="btnIniciarSessao" class="btn btnPrincipal btn-lg float-right w-100">Iniciar Sessão</button>
                </form>
            </div>
            <div class="col-sm">
                <div id="beforeRegistarConta" class="text-center">
                    <h5><b>Ainda não estás registado?</b></h5><br>
                    <p>O processo de registo é fácil e simples.</p>
                    <p>O registo leva pouco tempo e ajuda-nos a processar <br>o teu pedido de maneira mais eficiente.</p>
                    <br>
                    <h5>Criar uma conta traz vários benefícios.</h5>
                    <ul class="text-left" style="font-size:15px">
                        <li>Cria os teus Planos de Treino</li>
                        <li>Cria os teus Exercícios</li>
                        <li>Cria as tuas Aulas de Grupo</li>
                        <li>Acompanha os teus Dados Corporais</li>
                    </ul>
                    <br><button type="button" class="btn btnPrincipal btn-lg float-right w-100" onclick="mostrarRegisto()">Criar Conta</button>
                </div>
                <form method="POST" action="BaseDados/createAccount.php" role="login">
                    <div id="registarConta" style="display: none;">
                        <h5><b>Ainda não estás registado? Cria uma conta nova</b></h5><br>
                        <label for="exampleNomeCriar">Nome</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nomeCriar" id="nomeCriar" placeholder="nome">
                        </div>
                        <label for="exampleNomeUtilizadorCriar">Nome Utilizador</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nomeUtilizadorCriar" id="nomeUtilizadorCriar" placeholder="nome utilizador">
                        </div>
                        <label for="exampleEmailCriar">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="emailCriar" id="emailCriar" placeholder="email">
                        </div>
                        <label for="exampleContactoCriar">Contacto</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="contactoCriar" id="contactoCriar" placeholder="contacto">
                        </div>
                        <label for="examplePasswordCriar">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="passCriar" id="passwordCriar" placeholder="password">
                        </div>
                        <br><button type="submit" action="../StartPage/startPage.php" class="btn btnPrincipal btn-lg float-right w-100">Criar Conta</button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>