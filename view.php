<!DOCTYPE html>
<?php include_once "include/_settings.php"; ?>
<?php include_once 'include/_csvconvert.php'; ?>
<?php include_once "include/_markdown.php"; ?>
<?php include_once "include/_functions.php"; ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $site_name ?></title>
	<meta name="description" content="<?php echo $site_description ?>">
	<meta name="author" content="<?php echo $site_author ?>">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
	    <div class="container">
          <a class="brand" href="/"><?php echo $site_name ?></a>
          <ul class="nav">
            <li><a href="#">Rss</a></li>
          </ul>
        </div>
	  </div>
    </div>
	<div class="container" style="margin-top:60px;">
	  <div class="row">
	    <div class="span12">
          <?php
          $file = $_GET['file'];
          viewFile($file); 
          ?>
          <hr>
          <p style="text-align:right; color: #BBB; font-size: 0.9em;"><a href="<?php echo "posts/".$file; ?>">View TXT source</a> &bull; <a>JSON</a></p>
	    </div>
	  </div>
	</div>
  </body>
</html>
