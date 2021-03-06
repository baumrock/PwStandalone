<?php namespace ProcessWire;
require(__DIR__."/vendor/autoload.php");
$sanitizer = new Sanitizer();
$files = new WireFileTools();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ProcessWire Standalone</title>
  <link rel="stylesheet" href="lib/uikit.min.css" />
  <link rel="stylesheet" href="lib/highlight.min.css" />
  <script src="lib/uikit.min.js"></script>
  <script src="lib/uikit-icons.min.js"></script>
  <script src="lib/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <style>
  html,body{height:100%;width:100%;background:#f8f8f8;}
  </style>
</head>
<body>
  <section>
    <div class="uk-container uk-card uk-card-body uk-card-default">
      <h1>
        ProcessWire Standalone
        <a href="/" class='uk-float-right'><span uk-icon="home"></span></a>
      </h1>
      <?php
      $example = $sanitizer->text(@$_GET['example']);
      if($example) {
        echo "<h2>Example: <strong>$example</strong></h2>";
        $file = "examples/$example.php";
        $code = htmlspecialchars(file_get_contents($file));
        echo "<pre><code language='php'>$code</code></pre>";
        include($file);
      }
      else {
        echo "Examples:";
        echo "<ul>";
        $options = ['extension' => ['php'], 'recursive' => 1];
        foreach($files->find(__DIR__."/examples", $options) as $file) {
          $name = pathinfo($file, PATHINFO_FILENAME);
          $error = strpos($name, "_") === 0;
          $link = "<a href='?example=$name'>$name</a>";
          if($error) $link .= " <span class='uk-text-danger'>error</span>";
          echo "<li>$link</li>";
        }
        echo "</ul>";
      }
      ?>
    </div>
  </section>
  <div class='uk-padding-small uk-text-center uk-text-small'>
    <a href='https://www.baumrock.com'>baumrock.com</a>
  </div>
</body>
</html>
