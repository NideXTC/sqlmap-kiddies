<?php

require_once '../class/SiteMapGenerator.class.php';
$siteMapGenerator = new SiteMapGenerator("http://".$_POST['url']);
echo $siteMapGenerator->generateSiteMap();

?>