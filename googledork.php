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
        <?php
        $page = "googledork";
        require_once("include/menu.php");
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        ?>
        <div class="container">
            <div class="hero-unit">
                <fieldset>
                    <legend><p>Enter your Dork (<a href="http://www.exploit-db.com/google-dorks/" target="_blank">Google Dorks</a>) <span class='icon-arrow-right'></span></p></legend>
                    <div class="input-prepend input-append"  style="float: left; margin-right: 20px;" >
                        <input class="span4" id="direct_url" type="text" value="<?php echo $url; ?>" required="required">
                    </div>
                    <button id="submitDork" class="btn btn-primary" type="button"/><i class="icon-chevron-right icon-white"></i> Submit</button>
                    <br />
                    <br />
                    <br />

                </fieldset>
                <legend>Result<span class='icon-arrow-right'></span></legend>
                <div class="hero-unit result" id="result">Enter a website URL ...</div>
            </div>
            <hr />

            <?php require_once("include/footer.php"); ?>
        </div>
    </body>
</html>