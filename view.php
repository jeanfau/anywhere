<?php

$format = $_GET['format'];

if (empty($format)) {
  //normal view
  include_once "app/view/html.php";
} elseif ($format == json) {
  //json
  include_once "app/view/json.php";
} elseif ($format == xml) {
  //xml
  include_once "app/view/xml.php";
} elseif ($format == pdf) {
  //pdf
  include_once "app/view/pdf.php";
}

?>