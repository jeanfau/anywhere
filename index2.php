<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<?php include_once "app/include/_includes.php"; ?>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo $site_name; ?></title>
	<meta name="description" content="<?php echo $site_description; ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="css/doc.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>

	<!-- Primary Page Layout
	================================================== -->
    
	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 10px"><?php echo $site_name ?></h1>
			<h5><?php echo $site_description ?></h5>
			<hr />
			<div class="seven columns alpha">
			<h2>Welcome</h2>
			<p>To edit this page, simply open the file <code>index.php</code> and add your own description. To edit the title and the description of your documentation, edit <code>include/_settings.php</code>.</p>
			<h4>Download full documentation</h4>
			<a href="export.php" class="button" style="text-align: center;">Download PDF</a>
			<a href="#" class="button" style="text-align: center;">Download XML</a>
			<p>This will create a full copy of the documentation.</p>
			<h4>Get your own</h4>
			<a href="https://github.com/jeanfau/anywhere/zipball/master" class="button" style="text-align: center;">Download from GitHub (ZIP)</a>
			<a href="https://github.com/jeanfau/anywhere/tarball/master" class="button" style="text-align: center;">Download from GitHub (TAR)</a></br>
			You can also <a href="https://github.com/jeanfau/anywhere">view the project on GitHub</a>, or clone the repo :</br>
			<pre>$ git clone https://github.com/jeanfau/anywhere.git</pre>
			
			</div>
			<div class="nine columns omega">
			<h2>Index of /content</h2>
			<ul>
			  <?php getDirectory("content"); ?>
			</ul>
			<hr>
			<?php 
			
			function iterateDirectory($i)
			{
			    echo '<ul>';
			    foreach ($i as $path) {
			        if ($path->isDir())
			        {
			            echo '<li>';
			            iterateDirectory($path);
			            echo '</li>';
			        }
			        else
			        {
			            echo '<li>'.$path.'</li>';
			        }
			    }
			    echo '</ul>';
			}
			
			$dir = 'content';
			$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
			
			iterateDirectory($iterator);
			
			 ?>
			 
			 <hr>
			 

			  
			</div>
		</div>

		<div class="sixteen columns">
			<hr />
			<p style="float: left;"><a href="#">↩</a></p>
			<p style="text-align: right; margin-bottom: 5px;">&copy; <?php echo date("Y"); ?> <?php echo $site_name; ?> <span style="color: #AAA;">&bull;</span> Powered by <a href="http://jeanfau.github.com/anywhere/">documentat.io</a></p>
			<?php
			$time = microtime();
			$time = explode(' ', $time);
			$time = $time[1] + $time[0];
			$finish = $time;
			$total_time = round(($finish - $start), 4);
			echo "<p style='text-align: right; font-size: 0.9em;' class='muted'>Page generated in $total_time seconds</p>";
			?>
		</div>

	</div><!-- container -->

<!-- End Document
================================================== -->
</body>
</html>