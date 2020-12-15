<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #b72727">
  <div class="container-fluid">
    <a class="navbar-brand" href="../StartPage/startPage.php"><img src="../imgs/SVG/icon-branco.svg" height="35" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
      </span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link text-white mr-4" href="../MenuPages/planosTreino.php">Planos Treino <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link text-white mr-4" href="../MenuPages/exercicios.php">Exercícios</a>
        <a class="nav-item nav-link text-white mr-4" href="../MenuPages/aulasGrupo.php">Aulas Grupo</a>
        <a class="nav-item nav-link text-white" href="../MenuPages/perfil.php">Perfil</a>
      </div>
    </div>
    <div class="mr-xl-auto">
      <div class="dropdown">
        <div class="btn dropdown-toggle drop text-white" data-toggle="dropdown">
          <b><?php
              echo $_SESSION["nome"]; ?></b>
        </div>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="../MenuPages/perfil.php"><i class="fas fa-user-alt mr-2"></i>Perfil</a>
          <hr>
          <a class="dropdown-item" href="../Inicio/BaseDados/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>