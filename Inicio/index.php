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
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #b72727">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../imgs/SVG/logo-branco.svg" height="35" /></a>
      <div class="float-right">
        <a class="nav-item nav-link" href="login.php"><i class="fas fa-user-alt" style="color: white"></i></a>
      </div>
    </div>
  </nav>
  <header class="masthead" style="background-color:rgba(0,0,0,0.8)">
    <div class="container-fluid h-50">
      <div class="row h-100 align-items-center">
        <div class="col-md-6 text-center text-white">
          <h1 class="font-weight-bold">Manage your workout routine</h1>
          <p class="lead">Descobre uma forma mais
            engraçada de treinar <br>e assim
            terás sucesso.</p>
          <button type="button" id="btnComecaAgora" class="btn btnComecaAgora">Começa Agora!</button>
        </div>
        <div class="col-md-6">
          <img src="../imgs/PNG/imgBanner.png" class="w-100 h-100 ml-3" style="margin-left: 100px" />
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row mt-n4 h-50 align-items-center" style="margin-bottom: -5%">
      <div class="col-lg-4 text-center">
        <img src="../imgs/SVG/iconPlanosTreino.svg" width="30%" /><br><br>
        <p>Cria o teu <b>plano de treino</b>!</p>
      </div>
      <div class="col-lg-4 text-center">
        <img src="../imgs/SVG/iconExercicios.svg" width="30%" /><br><br>
        <p>Vê os teus <b>exercícios</b>!</p>
      </div>
      <div class="col-lg-4 text-center">
        <img src="../imgs/SVG/iconAulasGrupo.svg" height="30%" /><br><br>
        <p>Diverte-te com as <b>aulas de grupo</b>!</p>
      </div>
    </div>
  </div>
  <?php include '../Navbar/footer_notfixed.html' ?>
</body>

</html>