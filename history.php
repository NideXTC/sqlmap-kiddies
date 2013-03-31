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
        <?php $page = "history"; require_once("include/menu.php"); ?>
        <?php $file_db = new PDO('sqlite:db/history.sqlite3'); ?>
        <div class="container">
            <div class="hero-unit">
                <fieldset>
                    <legend><p>History <span class='icon-file'></span></p></legend>
                    <span class="help-block">Here is the history of your tests.</span>
                    <div class="hero-unit" style="background-color: #FFF;">
                      <div class="row-fluid">
                        <div class="accordion" id="accordion">
                          <?php
                          $result = $file_db->query('SELECT * FROM websites');
                          foreach($result as $row) {
                          ?>
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['id'] ?>">
                                <?php echo  $row['name']; ?>
                                <?php echo "<span class='pull-right'>" . $row['time'] . "</span>"; ?>
                              </a>
                            </div>
                            <div id="collapse<?php echo $row['id'] ?>" class="accordion-body collapse in">
                              <div class="accordion-inner">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur provident nihil animi dignissimos repudiandae iste impedit doloremque ab facilis vitae unde nisi nemo quisquam esse enim laudantium quae sapiente!
                              </div>
                            </div>
                          </div>

                          <?php
                          }
                          ?>
                        </div>
                        <table class="table table-stripped">
                        </table>
                      </div>
                    </div>
                </fieldset>
            </div>
            <hr />
            <?php require_once("include/footer.php"); ?>
        </div>
    </body>
</html>