<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar pagina</title>
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

       <a href="../index.php" class="btn btn-secondary" target="_blank" >
            <i class="icon icon-home"> <span class="texto2">Visitar sitio</span></i>
        </a>
        <a href="agregarPagina.php" class="btn btn-secondary">
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
                   <a href="ajustes.php" class="dropdown-item">
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
                            <div class="card-header bg-light">Editar página</div>
                            <div class="card-body">
                                <form method="post" action="verifEdit.php?id=<?php echo $_GET['id_pagina'] ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="Titulo" class="form-control-label">Titulo</label>
                                        <?php
                                            require_once 'config/config.php';
                                            require_once 'config/conexion.php';
                                            $base = new dbmysqli($hostname,$username,$password,$database);
                                            $id_pagina = $_GET['id_pagina'];
                                            $query = "SELECT pagina.title, pagina.content FROM pagina WHERE id_pagina = $id_pagina";
                                            $result = $base->ExecuteQuery($query);
                                            if ($result) {
                                                if ($row = $base->GetRows($result)) {
                                                    $title = $row[0];
                                                    $content = $row[1];
                                                }
                                                $base->SetFreeResult($result);
                                            }else{
                                                echo("Error al recuperar datos");
                                            }

                                        ?>
                                        <input id="Titulo" class="form-control" name="title" value="<?php echo($title)?>" required>
                                    </div>
									<div class="form-group">
          								<div class="col-sm-8">
            								<input type="file" class="form-control" id="miarchivo[]" name="miarchivo[]" multiple="">
          								</div>
									</div>
                                    <textarea id="mytextarea" name="content"> <?php echo($content) ?></textarea>
									<input type="submit" name="enviar" class="btn btn-outline-primary px-5" value="Guardar cambios"><br>
                                </form>
									<?php
										$link=mysqli_connect($hostname,$username,$password,$database);
										$result=mysqli_query($link,"select archivo from archivos where id_pagina='$id_pagina'");

										if($row=mysqli_fetch_array($result)){
											mysqli_data_seek($result,0);

											while($row=mysqli_fetch_array($result)){
												$enlaces=$row['archivo'];

												$cont=0;
												$tam=strlen($enlaces);
												for($i=0;$i<$tam;$i++){
													if($enlaces[$i]=='/'){
														$cont++;
													}

													if($cont==2){
														$res=substr($enlaces,$i+1,$tam-1);
														//echo $res;
														$res2=substr($enlaces,0,$i).$res;
														//echo $res2;
														break;
													}
												}

												echo "<div class='row py-2'>
														<div class='col-md-6'>
															<span>$res</span>
														</div>
														<div class='col-md-6'>
														<form method='post' action='edit.php?id_pagina=$id_pagina&arch=$enlaces' enctype='multipart/form-data'>
															<button type='submit' name='del' class='btn btn-danger'>¿Eliminar?</button>
														</div>
														</form>
													</div>

												";




											}

											if(isset($_REQUEST['del'])){
												$id=$_REQUEST['id_pagina'];
												$enlace=$_REQUEST['arch'];

												mysqli_query($link,"delete from archivos where id_pagina='$id' and archivo='$enlace'");
												echo "<META HTTP-EQUIV='refresh' CONTENT='0'>";
											}
										}
									?>


                                <?php
                                    /*if (isset($_POST['enviar'])) {
                                        $id_pagina = $_POST['enviar'];
										$ti=$_POST['title'];
										$con=$_POST['content'];
										$link=mysqli_connect($hostname,$username,$password,$database);
										//$result=mysqli_query($link,"select id_pagina from pagina where title='$ti' and content='$con'" );
										$result=mysqli_query($link,"select * from pagina order by id_pagina desc limit 1" );
                                        //echo("select id_pagina from pagina where title='$ti' and content='$con'");
										$row=mysqli_fetch_array($result);
										$var=$row['id_pagina'];

										foreach($_FILES["miarchivo"]['tmp_name'] as $key => $tmp_name)
 										{
 											//condicional si el fuchero existe
 											if($_FILES["miarchivo"]["name"][$key]) {
 												// Nombres de archivos de temporales
 												$archivonombre = $_FILES["miarchivo"]["name"][$key];
												$fuente = $_FILES["miarchivo"]["tmp_name"][$key];

 												$carpeta = 'archivos/'; //Declaramos el nombre de la carpeta que guardara los archivos

 												if(!file_exists($carpeta)){
													mkdir($carpeta, 0777) or die("\nHubo un error al crear el directorio de almacenamiento");
 												}

 												$dir=opendir($carpeta);
 												$target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos


 												if(move_uploaded_file($fuente, $target_path)) {
													mysqli_query($link,"insert into archivos values('$var','$target_path')");
													echo "\nLos archivos $archivonombre se han cargado de forma correcta.<br>";
 												} else {
 													echo "\nSe ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
 												}
 													closedir($dir); //Cerramos la conexion con la carpeta destino
 												}
 										}
                                    }
                                */?>
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
<script src='tinymce/tinymce.min.js'></script>
<script>
   tinymce.init({
    selector: '#mytextarea',
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
</script>
</body>
</html>
