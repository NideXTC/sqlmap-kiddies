<?php

ini_set ('max_execution_time', 0);

try {
    $file_db = new PDO('sqlite:../db/history.sqlite3');
    // Insertion query
    $qry = $file_db->prepare('INSERT INTO websites VALUES (null, ?, ?)');
    $qry->execute(array($_POST['url'], time()));
} catch (PDOException $e) {
    echo '0';
}

require_once '../class/SiteMapGenerator.class.php';
$siteMapGenerator = new SiteMapGenerator("http://".$_POST['url']);
echo $siteMapGenerator->generateSiteMap();

?>