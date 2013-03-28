<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SQLMap Kiddies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php $page = "cache"; require_once("include/menu.php"); ?>
    <div class="container">
      <div id="display-alert"></div>
      <div class="hero-unit">
        <div class="row-fluid">
          <div class="span12">
            <fieldset>
              <legend><p>Cache settings <span class=' icon-folder-open'></span></p></legend>
              <span class="help-block">Select the sitemaps you want to delete</span>
              <div class="row-fluid">
                <div class="span6">
                  <p>Websites</p>
                  <label class="checkbox">
                    <input id="select-all" type="checkbox" />All sitemaps
                  </label>
                  <br />
                  <?php
                  $folder = opendir("sitemap");
                  while (false !== ($file = readdir($folder))){
                    $path = "sitemap/".$file;

                    // Check if file isn't a folder or .gitkeep
                    if ($file != ".." AND $file != "." AND $file != ".gitkeep" AND !is_dir($file)){
                      echo '<label class="checkbox">';
                      echo '<input value="' . $file . '" class="sitemap-checkbox" type="checkbox" />' . substr($file, 0, -4);
                      echo '</label>';
                    }
                  }
                  ?>
                </div>
              </div>
              <br />
              <button id="delCache" class="btn btn-danger" type="button"/><i class="icon-trash icon-white"></i> Delete Cache</button>
            </fieldset>
          </div>
        </div>
      </div>
      <?php require_once("include/footer.php"); ?>
    </div>
  </body>
</html>