<?php

function viewFile($file) { 
$content = file_get_contents('posts/'.$file);
echo Markdown(nl2br($content));
}

function getMeta($file) { 
$content = file_get_contents('posts/'.$file);
preg_match_all("/(?:.*): (.*)\n/", $content, $matches);
global $file_title;
$file_title = $matches[1][0];
global $file_author;
$file_author = $matches[1][1];
global $file_date;
$file_date = $matches[1][2];
}

?>