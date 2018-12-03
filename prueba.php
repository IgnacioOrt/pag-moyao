<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>M.C. Yolanda Moyao Martínez</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
  
</head>
<body>
<form action="ver.php" method="POST">
  <textarea name="content" id="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
      </textarea>
      <input type="submit" name="enviar" value="Enviar">
</form>


	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
</body>
</html>
