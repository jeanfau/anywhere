<!DOCTYPE html>
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<?php include_once "include/_includes.php"; ?>
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
	  <div class="row">
	  <div class="span12">
	    <div class="page-header">
  		  <h1><?php echo $site_name ?> <small><?php echo $site_description ?></small></h1>
	    </div>
		<h3>Summary</code></h3>
		  <ul>
		    <?php getDirectory("posts"); ?>
		  </ul>
		  
		


<hr>

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
