<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
	 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body class="sidebar-fixed header-fixed">
	<?php session_start(); 
	if(!isset($_SESSION['nom'])) header("Location: login.html");

	?>
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a href="../index.php" class="btn btn-secondary" target="_blank" >
            <i class="icon icon-home"> <span class="texto2">Visitar sitio</span></i>
        </a>
        <a href="agregarPagina.php" class="btn btn-secondary" target="_blank">
            <i class="icon icon-plus"><span class="texto2"> Añadir</span> </i>
        </a>
        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <img src="./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo"> -->
                    <span class=" btn btn-danger small ml-1 d-md-down-none texto2"><?php $var=$_SESSION['nom']; echo "$var";?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    
                    <div class="dropdown-header">Ajustes</div>
                    <a href="ajustes.php" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Ajustes
                    </a>

                    <a href="php/salir.php" class="dropdown-item">
                        <i class="fa fa-lock"></i> Cerrar sesión
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                  <ul class="nav texto">
                    <li class="nav-title"></li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link enlace enlace2">
                            <i class="icon icon-home"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="paginas.php" class="nav-link enlace enlace2">
                            <i class="icon icon-docs"></i>Páginas
                        </a>
                    </li>
                    <li class="nav-item">

                        <!--<a href="index.html" class="nav-link enlace enlace2">-->
                        <a href="ajustes.php" class="nav-link enlace enlace2">
                            <i class="icon icon-settings"></i>Ajustes
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        require_once 'config/config.php';
                        require_once 'config/conexion.php';
                        $base = new dbmysqli($hostname,$username,$password,$database);
                        if (isset($_POST['enviar'])) {
                            function Error($msg)
                            {
                                ?>
                                    <div class="alert alert-dismissible alert-danger">
                                        <?php echo($msg) ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php
                                }
                                $title = utf8_decode($_POST['title']);
                                $description = $_POST['description'];
                                $username = $_POST['username'];
                                $pass1 = $_POST['password1'];
                                $pass2 = $_POST['password2'];
                                $errores = 0;
                                //CAMBIOS A TITULO DEL SITIO
                                $update = "UPDATE sitio SET title = '$title'";
                                if ($base->ExecuteQuery($update)) {
                                }else{
                                    $errores++;
                                    Error("Error al cambiar título");
                                }
                                //CAMBIOS A DESCRIPCION DEL SITIO
                                $update = "UPDATE sitio SET description = '$description'";
                                if ($base->ExecuteQuery($update)) {
                                }else{
                                    $errores++;
                                    Error("Error al cambiar descripción");
                                }
                                //CAMBIO DE USUARIO
                                $update = "UPDATE administrador SET username = '$username'";
                                if ($base->ExecuteQuery($update)) {

                                }else{
                                    $errores++;
                                    Error("Error al cambiar nombre de usuario");
                                }
                                //CAMBIO DE CONTRASEÑA
                                if (strlen($pass1) != 0 && strlen($pass2)) {
                                    if( strlen($pass1) >= 8 && strlen($pass2) >= 8){
                                        if ($pass1 == $pass2) {
                                            $update = "UPDATE administrador SET password = '$pass1'";
                                            if ($base->ExecuteQuery($update)) {
                                            }else{
                                                $errores++;
                                                Error("Error al cambiar la contraseña");
                                            }
                                        }else{
                                            $errores++;
                                            Error("Las contraseñas no coinciden");
                                        }
                                    }else{
                                        $errores++;
                                        Error("El tamaño de la contraseña debe ser mayor de 8 caracteres");
                                    }
                                }
                                if ($errores == 0) {
                                    ?>
                                    <div class="alert alert-dismissible alert-success">
                                        Información guardada correctamente
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                        <div class="card">
                            <div class="card-header bg-light">Ajustes</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $query="SELECT administrador.username, sitio.title, sitio.description FROM administrador,sitio;";

                                            $result = $base->ExecuteQuery($query);
                                            if($result){
                                                if ($row=$base->GetRows($result)){
                                        ?>
                                        <form action="ajustes.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="Titulo" class="form-control-label">Titulo del sitio</label>
                                            <input id="Titulo" name="title" class="form-control" value="<?php echo(utf8_encode($row[1])); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Descripcion" class="form-control-label">Descripción corta </label>
                                            <input id="Descripcion" name="description" class="form-control" value="<?php echo(utf8_encode($row[2])); ?>">
                                        </div>
                                        <label for="usuario" class="form-control-label">Nombre de usuario<br></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input id="usuario" type="text" name="username" class="form-control" placeholder="Nombre de usuario" value="<?php echo($row[0]); ?>">
                                        </div>
                                        <br>
                                        <label>Cambiar contraseña</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pass1" class="form-control-label">Nueva contraseña </label>
                                                    <input type="password" name="password1" id="pass1" class="form-control" >
                                                </div>
                                                <small id="passwordHelpInline" class="text-muted">
                                                    La contraseña debe contener al menos ocho caracteres
                                                </small>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pass2" class="form-control-label">Confirmar contraseña </label>
                                                    <input type="password" name="password2" id="pass2" class="form-control" aria-describedby="passwordHelpInline">
                                                </div>

                                            </div>
                                        </div>
                                        <div id="errores"></div>
                                        <input type="submit" name="enviar" class="btn btn-outline-primary px-5" value="Guardar cambios">
                                        </form>
                                        <?php
                                            }
                                                $base->SetFreeResult($result);
                                            }else {
                                                echo "<h3>Error generando la consulta</h3>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/popper.js/popper.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="./vendor/chart.js/chart.min.js"></script>
<script src="./js/carbon.js"></script>
<script src="./js/demo.js"></script>
</body>
</html>
