<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
      require_once 'admin/config/config.php';
      require_once 'admin/config/conexion.php';
      $base = new dbmysqli($hostname,$username,$password,$database);
      $query="SELECT sitio.title, sitio.description FROM sitio;";
      $result = $base->ExecuteQuery($query);
      if($result){
        if ($row=$base->GetRows($result)){
          ?>
          <title><?php echo (utf8_encode($row[0]." | ".$row[1]));?></title>
          <?php
        }
        $base->SetFreeResult($result);
      }else {
        ?>
        <title>Error inesperado al obtener titulo</title>
        <?php
      }
    ?><!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Inicio</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <?php
              $query="SELECT pagina.id_pagina, pagina.title FROM pagina;";
              $result = $base->ExecuteQuery($query);
              if ($result) {
                while ($row=$base->GetRows($result)) {
                  ?>
                    <li class="nav-item">
                      
                      <a class="nav-link" href="pagina.php?id_pagina=<?php echo($row[0]) ?>" enctype="multipart/form-data"><?php echo ($row[1]); ?></a>
                    </li>
                  <?php
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <?php
                $query="SELECT sitio.title, sitio.description FROM sitio;";
                $result = $base->ExecuteQuery($query);
                if($result){
                  if ($row=$base->GetRows($result)){
                    ?>
                    <h1><?php echo (utf8_encode($row[0])); ?></h1>
                    <span class="subheading"><?php echo (utf8_encode($row[1])) ?></span>
                    <?php
                  }
                  $base->SetFreeResult($result);
                }else {
                  ?>
                  <h1>Error inesperado al obtener titulo</h1>
                  <?php
                }
                $base->CloseConnection();
              ?>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
