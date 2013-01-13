<?php

function viewPost ($file) { 
$file = file_get_contents('posts/'.$file);
echo Markdown(nl2br($file));
}

?>