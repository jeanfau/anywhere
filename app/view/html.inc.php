<!DOCTYPE html>
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<?php include_once "app/include/_includes.php"; ?>
<html>
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" />
    <title><?php echo $site_name ?></title>
	<meta name="description" content="<?php echo $site_description ?>">
	<meta name="author" content="<?php echo $site_author ?>">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script src="js/smooth.pack.js"></script>
  </head>
  <body>
	<div class="container">
	  <div class="page-header">
  	    <h1><?php echo $site_name ?> <small><?php echo $site_description ?></small></h1>
	  </div>
	  <ul class="breadcrumb">
        <li><a href="#"><?php
		$installation_directory = substr($_SERVER["SCRIPT_NAME"], 1, -9);
		echo ("<a href=' /$installation_directory'>Index</a>");
		?></a> <span class="divider">/</span></li>
		<?php
		  $filePath = $_GET['path'];
		  $pathinfo = pathinfo($filePath);
		  $dirname = $pathinfo[dirname];
		  $folders = explode('/', $dirname);
		  foreach ($folders as $folder) {
		    echo ("<li><a href='#'>".$folder."</a> <span class='divider'>/</span></li>");
		  }
		?>
        <li class="active"><?php
		$filePath = $_GET['path'];
		echo getFileTitle($filePath); 
		?></li>
      </ul>
	  <div class="row">
	    <div class="span12">
          <?php
          $filePath = $_GET['path'];
          viewFile($filePath); 
          ?>
          <hr>
	    </div>
	  </div>
	  <div class="row">
		<div class="span6">
          <div class="btn-group" style="float: left;">
            <a class="btn btn-mini" href="<?php echo $filePath; ?>">txt</a>s</a>
			<a class="btn btn-mini" href="view.php?path=<?php echo $filePath; ?>&format=pdf">pdf</a>
            <a class="btn btn-mini" href="view.php?path=<?php echo $filePath; ?>&format=json">json</a>
            <a class="btn btn-mini" href="view.php?path=<?php echo $filePath; ?>&format=xml">xml</a>
          </div>
		</div>
		<div class="span6">
		  <p style="text-align: right;" class="muted">&copy; <?php echo date("Y"); ?> <?php echo $site_name; ?> &bull; Powered by <a href="http://jeanfau.github.com/anywhere/">documentat.io</a></p>
		  <?php
		  $time = microtime();
		  $time = explode(' ', $time);
		  $time = $time[1] + $time[0];
		  $finish = $time;
		  $total_time = round(($finish - $start), 4);
		  echo "<p style='text-align: right; font-size: 0.9em;' class='muted'>Page generated in $total_time seconds</p>";
		  ?>
	    </div>
	  </div>
	</div>
  </body>
</html>
