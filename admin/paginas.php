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
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a href="../" class="btn btn-secondary" target="_blank" >
            <i class="icon icon-home"> <span class="texto2">Visitar sitio</span></i>
        </a>
        <a href="../" class="btn btn-secondary" target="_blank">
            <i class="icon icon-plus"><span class="texto2"> Añadir</span> </i>
        </a>
        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <img src="./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo"> -->
                    <span class=" btn btn-danger small ml-1 d-md-down-none texto2">Cuenta</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    
                    <div class="dropdown-header">Ajustes</div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Ajustes
                    </a>

                    <a href="#" class="dropdown-item" >
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
                        <div class="card">
                            <div class="card-header bg-light">Páginas</div>
                            <div class="card-body">
                                <button class="btn btn-outline-secondary btn-sm"><a href="agregarPagina" style="color:black;">Agregar página</a></button>
                                

                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Fecha</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-nowrap">Samsung Galaxy S8<br>
                                            <a href="edit.php">Editar |</a>
                                            <a href="">Edición rapida |</a>
                                            <a href="">Eliminar |</a>
                                            <a href="">Vista previa |</a>
                                        </td>
                                        <td>31,589</td>
                                    </tr>
                                    </tbody>
                                </table>
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
