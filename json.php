<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<?php include_once "include/_includes.php"; ?>
<?php header('Content-type: application/json'); ?>
[{
  "file": {
    "content": <?php
$filePath = $_GET['path'];
json($filePath); 
?>,
    "response_time": "<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo (json_encode($total_time));
?>"
  }
}]