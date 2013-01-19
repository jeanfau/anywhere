<?php

$format = $_GET['format'];

if (empty($format)) {
  include_once "app/view/html.inc.php";
} elseif ($format == json) {
  include_once "app/view/json.inc.php";
} elseif ($format == xml) {
  include_once "app/view/xml.inc.php";
} elseif ($format == pdf) {
  include_once "app/view/pdf.inc.php";
}

?>