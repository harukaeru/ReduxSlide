<!DOCTYPE html>
<html>
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <style>
      @import url(https://fonts.googleapis.com/css?family=Droid+Serif);
      @import url(https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz);
      @import url(https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic);

      body { font-family: 'Droid Serif'; }
      h1, h2, h3 {
        font-family: 'Yanone Kaffeesatz';
        font-weight: normal;
      }
      .remark-code, .remark-inline-code { font-family: 'Ubuntu Mono'; }
      .red { color: red }
      .blue { color: blue }
      .bold {font-weight: bold; }
    </style>
  </head>
  <body>
<textarea id="source">
<?php
    $mdFileName = "redux.md";
    if ($argv[1]) {
        $mdFileName = $argv[1];
    }
    if(file_exists($mdFileName)){
      echo file_get_contents($mdFileName);
    }
?>
</textarea>
    <script src="remark-latest.min.js">
    </script>
    <script>
      var slideshow = remark.create();
    </script>
  </body>
</html>
