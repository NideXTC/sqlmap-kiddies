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
        <style type="text/css"></style>

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
        <?php
        $page = "index";
        require_once("include/menu.php");
        ?>
        <div class="container" >
            <div class="row span12" style="text-align: center; ">
                <?php
                // OS detection 
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    $win = true;
                } else {
                    $win = false;
                }


                if ($win) {
                    echo '<div class="label label-success" style="padding :20px; font-size : 20px;display : block ; margin-bottom : 20px;"  >OS Base : Windows</div>';
                } else {
                    echo '<div class="label label-success" style="padding :20px; font-size : 20px;display : block ; margin-bottom : 20px; "  >OS Base : Unix</div>';
                }
                
                 // Version of PHP
                $version = explode('.', PHP_VERSION);

                if ($version[0] == '5') {
                    echo '<div class="label label-success" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >PHP Version OK (5.0.0 or more) </div>';
                } else {
                    echo '<div class="label label-important" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >PHP Version not up to date (request 5.0.0 or more)</div>';
                }

                // SQLMap Detection 
                if (file_exists('modules/sqlmap')) {
                    echo '<div class="label label-success" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >SQLMap found </div>';
                } else {
                    echo '<div class="label label-important" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >SQLMap not found ! </div>';
                }

                // Detection of SQLite 
                if (extension_loaded('pdo_sqlite')) {
                    echo '<div class="label label-success" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >SQLite 3 supported</div>';
                } else {
                    echo '<div class="label label-important" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >SQLite 3 not supported</div>';
                }

                // Detection of History DB
                if (file_exists('db/history.sqlite3')) {
                    echo '<div class="label label-success" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >History-SQLite found </div>';
                } else {

                    if (extension_loaded('pdo_sqlite')) {
                        $file_db = new PDO('sqlite:db/history.sqlite3');
                        $file_db->exec('CREATE TABLE IF NOT EXISTS websites (id INTEGER PRIMARY KEY, name TEXT, time TEXT)');
                        $file_db->exec('CREATE TABLE IF NOT EXISTS links (id INTEGER PRIMARY KEY, url TEXT, website_id INTEGER, success BOOLEAN)');
                        echo '<div class="label label-warning" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >History-SQLite not found -> database created</div>';
                    } else {
                        echo '<div class="label label-important" style="padding :20px; font-size : 20px;display : block ;margin-bottom : 20px; "  >History-SQLite not found -> SQLite 3 not supported, impossible to create the database</div>';
                    }
                }

               
                ?>   
            </div>
            <?php require_once("include/footer.php"); ?>
        </div>
    </body>
</html>