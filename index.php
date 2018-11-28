<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>M.C. Yolanda Moyao Martínez</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body >
<h1>Edit Article</h1>
  <form action="form_handler.php" method="post">
    <div>
      <textarea cols="80" rows="10" id="content" name="content"> 
        &lt;h1&gt;Article Title&lt;/h1&gt;
        &lt;p&gt;Here's some sample text&lt;/p&gt;
      </textarea>
      <script type="text/javascript">
        CKEDITOR.replace( 'articleContent' );
      </script>
      <input type="submit" value="Submit"/>
    </div>
  </form>
	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>
