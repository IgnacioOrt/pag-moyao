<!DOCTYPE html>
<html lang="es">
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
    <link href="css/style.css" rel="stylesheet" >
    <style type="text/css">
      navbar {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  flex-shrink: 0;
  align-items: center;
  align-self: stretch;

  > * {
    flex-shrink: 0;
  }
}
    </style>
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
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
   <?php
      $link=mysqli_connect($hostname,$username,$password,$database);
      $result=mysqli_query($link,"select picture from sitio");
      $row=mysqli_fetch_array($result);
    
      $dir=$row['picture'];
    ?>
    <header class="masthead" style="background-image: url('<?php echo $dir; ?>')">
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
          <?php
				$result=mysqli_query($link,"select content from sitio");
				if($result){
					if($row=mysqli_fetch_array($result)){
						$text=$row['content'];
						echo $text;
					}
				}
				
			?>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span><h5 style="font-weight:bolder">E-Mail</h5></span>
      <a href="mailto:ymoyao@cs.buap.mx">ymoyao@cs.buap.mx</a>
      <br>
      <span><br><h5 style="font-weight:bolder">Cubículo</h5><br></span>
      <span><h5 style="font-weight:bolder">Dirección</h5><p>Av. San Claudio y 14 sur. Col. San Manuel. C.P. 72570. Puebla, Pue., México</p></span>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto text-center">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" style="color:white">Contacto</span>
                </a>
              </li>
              
            </ul>
        <span style="font-size:0.8em;font-weight: lighter;font-style: italic;"><br>M.C. Yolanda Moyao Martínez</span>
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
    <script type="text/javascript">
      $('.dropdown-toggle').click(function() { var location = $(this).attr('href'); window.location.href = location; return false; });
    </script>
  </body>

</html>