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
    <style>
        .texto{
            font-family: 'Lato', sans-serif;
            font-weight: lighter;
            font-size: 1.3em;
            
        }
        .texto2{
            font-family: 'Fira Sans', sans-serif;
            font-weight: normal;
            font-size: 1em;
        }
        body{
            font-family: 'Karla', sans-serif;
            font-size: 1rem;
        }
        .sidebar{
            background-color:antiquewhite;
            
        }
        .sidebar .nav-link{
            color: black;
        }
        .sidebar .nav-link i:first-of-type{
            color:black;
        }
        
        .enlace:hover{
            background-color:white;
        }
        
        .enlace2:active{
            background-color:lightpink;
        }
        .page-header{
            background-image: url("imgs/banner.png");
            background-color: transparent;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: contain;
            
        }
        
    
        
        
    </style>
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
                                <a href="agregarPagina">Agregar página</a>
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Sales</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="text-nowrap">Samsung Galaxy S8</td>
                                        <td>31,589</td>
                                        <td>$800</td>
                                        <td>5%</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="text-nowrap">Google Pixel XL</td>
                                        <td>99,542</td>
                                        <td>$750</td>
                                        <td>3%</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="text-nowrap">iPhone X</td>
                                        <td>62,220</td>
                                        <td>$1,200</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="text-nowrap">OnePlus 5T</td>
                                        <td>50,000</td>
                                        <td>$650</td>
                                        <td>5%</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td class="text-nowrap">Google Nexus 6</td>
                                        <td>400</td>
                                        <td>$400</td>
                                        <td>7%</td>
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
