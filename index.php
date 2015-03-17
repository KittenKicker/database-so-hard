
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include 'head.html';

      if(isset($_GET["proposal"])) {
        $page_name = "proposalview.php";
      }
      else {
        $page_name = "proposallist.php";
      }
    ?>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://webtech.kettering.edu/~lind6441/proposal-database-project/">Kettering Proposal System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php if($page_name == "proposallist.php"): ?>
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>If you have an idea to improve something at Kettering University, or you just want to see what other great ideas people have thought of, you've come to the right place! Check out recent proposals below or <?php if (!isset($_SESSION["uid"])): ?>sign in to <?php endif ?>submit an idea of your own!</p>
        
        <?php if (!isset($_SESSION["uid"])): ?>
          <form class="navbar-form custom-login-form" action="authentication.php" method="POST">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        <?php endif ?>

        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
      </div>
    </div>
    <?php endif ?>

    <div class="container">
      <?php include $page_name; ?>
      http://webtech.kettering.edu/~lind6441/proposal-database-project/proposalview.php?proposal=20
      <!-- <hr> -->
      <?php
        var_dump($_SESSION);
      ?>
      <!-- <footer>
        <p>&copy; Company 2014</p>
      </footer> -->
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
