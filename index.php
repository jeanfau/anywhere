<!DOCTYPE html>
<?php include_once "include/_settings.php"; ?>
<?php include 'include/_csvconvert.php'; ?>
<?php include_once "include/_markdown.php"; ?>
<html>
  <head>
    <title><?php echo $site_name?></title>
	<meta name="description" content="<?php echo $site_description?>">
	<meta name="author" content="<?php echo $site_author?>">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
  </head>
  <body>
    <h1>Blog index</h1>
	<?php
	foreach (json_decode($json) as $data) {
	  echo '<h2>'.$data->title.'</h2>';
	  echo $data->date.'<br>';
	  echo Markdown($data->content).'<br>';
	}
	?>
  </body>
</html>