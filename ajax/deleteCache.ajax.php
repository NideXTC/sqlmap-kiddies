<?php

$sitemaps = $_POST['sitemaps'];

$res = 0;
$cache_folder = "../sitemap";
$folder = opendir($cache_folder);

while (false !== ($file = readdir($folder))){ // Reading each file of the folder
  $path = $cache_folder."/".$file;

  // Check if file isn't a folder or .gitkeep
  if ($file != ".." AND $file != "." AND $file != ".gitkeep" AND !is_dir($file)){
    if (in_array($file, $sitemaps)){
       unlink($path);
    }
  }
}

closedir($folder);
echo $res;