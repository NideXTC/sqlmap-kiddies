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
        <script src="js/main.js"></script>

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->   
    </head>

    <body>


        <?php  $page = "lien" ; require_once("include/menu.php"); ?>
        <div class="container">
            <div class="hero-unit">
                <fieldset>
                    <legend>Enter your URL<span class='icon-arrow-right'></span></legend>
                    <form method="POST">
                        <input id="url" name="url" type="text" size="50" /><br />
                        <input id="submit" type="button" name="submit" value="Submit" />
                    </form>
                </fieldset>
                <legend>Result<span class='icon-arrow-right'></span></legend>
                <div class="hero-unit result" id="result"></div>
            </div>

            <hr>

            <footer>
                <p>&copy; SQLMap Kiddies - CSLI Developpement</p>
            </footer>

        </div> <!-- /container -->


    </body>
</html>

