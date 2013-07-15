<?php
function viewFile($path) { 
  if (file_exists($path)) {
    $content = file_get_contents($path);
    echo Markdown(nl2br($content));
  } else {
    $installation_directory = substr($_SERVER["SCRIPT_NAME"], 0, -9);
    echo("<p>This document does not exists or has been moved.</p>");
	echo("<p><a href='".$installation_directory."'>Return to homepage &rarr;</a></p>");
  }
}

function json($path) { 
  if (file_exists($path)) {
    $content = file_get_contents($path);
    echo json_encode($content);
  } else {
    echo json_encode("This document does not exists or has been moved.");
  }
}

function xml($path) { 
  if (file_exists($path)) {
    $content = file_get_contents($path);
    echo ($content);
  } else {
    echo ("This document does not exists or has been moved.");
  }
}

function getFileTitle($file) { 
  $content = file_get_contents($file);
  preg_match_all("/(?:.*): (.*)\n/", $content, $matches);
  $file_title = $matches[1][0];
  return $file_title;
}

function getFileContent($file) { 
  $content = file_get_contents($file);
  preg_match_all("/(?:.*): (.*)\n/", $content, $matches);
  return $matches;
}

function getFileAuthor($file) { 
  $content = file_get_contents($file);
  preg_match_all("/(?:.*): (.*)\n/", $content, $matches);
  $file_author = $matches[1][1];
  return $file_author;
}

function getDirectory( $path = '-', $level = 0 ){ 
  $ignore = array('cgi-bin', '.', '..'); 
  $dh = @opendir($path); 
  while(false !== ($file = readdir($dh))) { // Loop through the directory
        if (!in_array($file, $ignore)) { 
            $before = str_repeat('<li><ul>', $level);
			$after = str_repeat('</ul></li>', $level);			
            if (is_dir( "$path/$file" )) { 
                echo "$before<li><strong>$file/</strong></li>$after\n";
                getDirectory( "$path/$file", ($level+1) ); 
            } else { // Print out the filename 
				$filePath = $path.'/'.$file; 
				$fileTitle = getFileTitle($filePath);
				$fileSize = filesize($filePath);
				$fileModif = date ("F d Y H:i:s.", filemtime($filePath));
				echo "$before<li><a href='view.php?path=$filePath'>$fileTitle</a> <span class='muted' style='margin-left:10px;'>($file, level $level, $fileSize bytes, $fileModif)</span></li>$after\n";
            } 
        } 
    } 
    closedir( $dh ); // Close the directory handle
}

function export ($path = '-') { 
  $ignore = array('cgi-bin', '.', '..'); 
  $dh = @opendir($path); 
  while(false !== ($file = readdir($dh))) { // Loop through the directory
        if (!in_array($file, $ignore)) { 			
            if (is_dir( "$path/$file" )) { 
                echo "<h1>$file</h1><hr>";
                export( "$path/$file", ($level+1) ); 
            } else { // Print out the filename 
				$filePath = $path.'/'.$file; 
				$fileTitle = getFileTitle($filePath);
				$fileSize = filesize($filePath);
				$fileModif = date ("F d Y H:i:s.", filemtime($filePath));
				echo "<h2>$fileTitle</h2>\n";
				echo(viewFile($filePath));
				echo("<hr>");
            } 
        } 
    } 
    closedir( $dh ); // Close the directory handle
} 
?>