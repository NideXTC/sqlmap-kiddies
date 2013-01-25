<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="index.php">SQLMap Kiddies</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="<?php if($page == "index") echo "active" ?>"><a href="index.php">Site</a></li>
          <li class="<?php if($page == "page") echo "active" ?>"><a href="page.php">Page</a></li>
          <li class="<?php if($page == "lien") echo "active" ?>"><a href="lien.php">Lien</a></li>
          <li class="<?php if($page == "googledork") echo "active" ?>"><a href="googledork.php">Google Dork</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>