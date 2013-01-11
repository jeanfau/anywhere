<!DOCTYPE html>
<?php include_once "include/_settings.php"; ?>
<?php include 'include/_csvconvert.php'; ?>
<?php include_once "include/_markdown.php"; ?>
<html>
  <head>
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
	  foreach (json_decode($json) as $data) {
	    echo '<h2>'.$data->title.'</h2>';
	    echo $data->date.'<br>';
	    echo Markdown($data->content);
		echo ("<hr>");
	  }
	  ?>
	  </div>
	  </div>
	</div>
  </body>
</html>