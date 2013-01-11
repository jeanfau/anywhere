<!DOCTYPE html>
<html>
  <head>
    <title>Blog @anywhere</title>
  </head>
  <body>
    <h1>Blog index</h1>
	<?php include '_csvconvert.php'; ?>
	<?php include_once "_markdown.php"; ?>
	<?php
	foreach (json_decode($json) as $data) {
	  echo '<h2>'.$data->title.'</h2>';
	  echo $data->date.'<br>';
	  echo Markdown($data->content).'<br>';
	}
	?>
  </body>
</html>