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
        <script type="text/javascript">
            function precharger_images(url){
                var img = new Image();
                img.src=url;
            }            
            $(window).load(function(){
                precharger_images("img/ajax-loader.gif");
            });
        </script>
        <script src="js/main.js"></script>
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
        <?php $page = "index"; require_once("include/menu.php"); ?>
        <div class="container">
            <div id="display-alert"></div>
            <div class="hero-unit">            
                <fieldset>
                    <legend><p>Enter your URL<span class='icon-arrow-right'></span></p></legend>
                    <div class="input-prepend input-append"  style="float: left; margin-right: 20px;" >
                        <span class="add-on">http://</span>
                        <input class="span4" id="website_url" type="text" required="required">
                        <span class="add-on">/</span>
                    </div>
                    <input id="submitWebsite" class="btn btn-primary"type="button" name="submit" value="Submit" />
                    <input id="delCache" class="btn btn-danger" type="button" name="submit" value="Delete Cache" />
                    <br />
                    <br />
                    <br />
                    <form id="formsqlmap">
                      <div class="row">
                        <label for="dbms" class="span3">Select your database :</label>
                        <select id="dbms" name="dbms" class="span3">
                          <option value="" selected="selected">Choose your DBMS</option>
                          <option value="--dbms mysql" >MySQL</option>
                          <option value="--dbms oracle" >Oracle</option>
                          <option value="--dbms microsoft sql server" >Microsoft SQL Server</option>
                          <option value="--dbms postgresql" >PostgreSQL</option>
                          <option value="--dbms microsoft access" >Microsoft Access</option>
                          <option value="--dbms sqlite" >SQLite</option>
                          <option value="--dbms firebird" >Firebird</option>
                          <option value="--dbms sybase" >Sybase</option>
                          <option value="--dbms sap maxdb" >SAP MaxDB</option>
                        </select>
                      </div>
                      <div class="row">
                        <label for="dbms" class="span2">Options :</label>
                        <div class="span9 offset1">
                          <label for="tor" class="checkbox span2">Activate TOR<input type="checkbox" name="tor" id="tor" value="--tor"  /></label>
                          <label for="data" class="checkbox span2">Activate POST<input type="checkbox" disabled="disabled" n ame="data" id="data" value="--data" /></label>
                        </div>
                        <div class="span9 offset1">
                          <label for="keepalive" class="checkbox span2">Keep Alive<input type="checkbox" name="keepalive" id="keepalive" value="--keep-alive" /></label>
                          <label for="nullconnection" class="checkbox span2">Null Connection<input type="checkbox" name="nullconnection" id="nullconnection" value="--null-connection" /></label>
                        </div>
                      </div>
                    </form>
                </fieldset>
                <legend>Result<span class='icon-arrow-right'></span></legend>
                <div class="hero-unit result" id="result">Enter a website URL ...</div>
            </div>
            <hr>

            <?php $page = "index";
            require_once("include/footer.php");
            ?>
        </div>
    </body>
</html>