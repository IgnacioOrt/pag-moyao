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
                    <span class=" btn btn-danger small ml-1 d-md-down-none texto2"><?php $var=$_SESSION['nom']; echo "$var";?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    
                    <div class="dropdown-header">Ajustes</div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Ajustes
                    </a>

                    <a href="php/salir.php" class="dropdown-item" >
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
                                <div class="mb-4">
                                    <button class="btn btn-outline-secondary btn-sm"><a href="agregarPagina.php" style="color:black;">Agregar página</a></button>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th></th>
                                        <!-- <th>Fecha</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                            require_once 'config/config.php';
                                            require_once 'config/conexion.php';
                                            $base = new dbmysqli($hostname,$username,$password,$database);
                                            $query = "SELECT pagina.id_pagina, pagina.title FROM pagina";
                                            $query2 = "SELECT id_pagina,title FROM pagina WHERE id_pagina NOT IN (SELECT id_pagina FROM subpagina)";
                                            $result = $base->ExecuteQuery($query);
                                            if($result){
                                                while ($row=$base->GetRows($result)){
                                                    ?>
                                                    <tr>
                                                        <td class="text-nowrap"><a href="../pagina.php?id_pagina=<?php echo($row[0]) ?>" target="_blank"><?php echo($row[1]) ?></a><br>
                                                            <a href="edit.php?id_pagina=<?php echo($row[0])?>">Editar |</a>
                                                            <!-- <a href="">Edición rapida |</a> -->
                                                            <a href="delete.php?id_pagina=<?php echo($row[0])?>" onclick="return confirm('¿Esta seguro que desea eliminar?');">Eliminar |</a>
                                                            <a href="../pagina.php?id_pagina=<?php echo($row[0]) ?>" target="_blank">Vista previa</a>
                                                        </td>
                                                        <td>
                                                            <form class="form-inline" method="POST" action="#">
                                                                <div class="form-group">
                                                                    <label for="select">Superior  </label>
                                                                    <select class="form-control" id="select" name="superior">
                                                                        <option selected value="1">Página principal (sin superior)</option>
                                                                        <?php
                                                                            $result2 = $base->ExecuteQuery($query2);
                                                                            if ($result2) {
                                                                                while ($row2=$base->GetRows($result2)) {
                                                                                    $query3 = "SELECT pagina_superior FROM subpagina WHERE id_pagina = $row[0]";
                                                                                    $result3 = $base->ExecuteQuery($query3);
                                                                                    if ($result3) {

                                                                                        if ($sql = $base->GetRows($result3)) {?>
                                                                                    <script type="text/javascript">
                                                                                        console.log( "<?php echo($query3); ?>");

                                                                                    </script>
                                                                                    <?php
                                                                                            ?>
                                                                                            <option selected onchange="obtenerID(<?php echo($row2[0]) ?>)"><?php echo($row2[1]) ?></option>
                                                                                            <?php
                                                                                        }else{
                                                                                        ?>
                                                                                        <option value="1" onchange="obtenerID(<?php echo($row2[0]) ?>)"><?php echo($row2[1]) ?></option>
                                                                                        <?php   
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $base->SetFreeResult($result);
                                            }else{
                                                echo "<h3>Error generando la consulta</h3>";
                                            }

                                        ?>
                                        <!-- <td>31,589</td> -->
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
<script type="text/javascript">
    function obtenerID(id) {
        console.log(id);
    }
</script>
</body>
</html>
