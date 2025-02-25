<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Logo</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Category</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Search Here...">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>

      <?php if (!isset($_SESSION["user"]["username"])) { ?>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="?login=true">Login</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="?signup=true">SignUp</a></li>
        </ul>
      <?php } ?>

      <?php if (isset($_SESSION['user']['username'])) { ?>
        <input type="hidden" name="signout" value="true">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="?ask=true">Ask a question</a></li>
          <li><a href="./server/requests.php?logout=true">Logout</a></li>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>