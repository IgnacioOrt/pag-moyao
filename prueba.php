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
  <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>

        <div id="editor"></div>
	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
    /**
 * Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

/* exported initSample */

if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
  CKEDITOR.tools.enableHtml5Elements( document );

// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';

var initSample = ( function() {
  var wysiwygareaAvailable = isWysiwygareaAvailable(),
    isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

  return function() {
    var editorElement = CKEDITOR.document.getById( 'editor' );

    // :(((
    if ( isBBCodeBuiltIn ) {
      editorElement.setHtml(
        'Hello world!\n\n' +
        'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
      );
    }

    // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
    if ( wysiwygareaAvailable ) {
      CKEDITOR.replace( 'editor' );
    } else {
      editorElement.setAttribute( 'contenteditable', 'true' );
      CKEDITOR.inline( 'editor' );

      // TODO we can consider displaying some info box that
      // without wysiwygarea the classic editor may not work.
    }
  };

  function isWysiwygareaAvailable() {
    // If in development mode, then the wysiwygarea must be available.
    // Split REV into two strings so builder does not replace it :D.
    if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
      return true;
    }

    return !!CKEDITOR.plugins.get( 'wysiwygarea' );
  }
} )();


  </script>
  <script>
  initSample();
</script>
  
</body>
</html>
