<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Survey Manager</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(isset($_SESSION['token'])) { ?>
          <li class="active"><a href="user-statiscts.php">My Statistics</a></li>
          <li><a href="user-surveies.php">My Surveies</a></li> 
          <li><a href="add-survey.php">Add Survey</a></li>
          <?php } else{ ?>
            <li><a href="public-surveies.php">Public Surveies</a></li>
          <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['token'])) { ?>
        <li><a href="../controller/user/logout.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
        <?php } else { ?>
          <li><a href="/survey/view/signup.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
          <li><a href="/survey/view/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php } ?>

        <li>
        <form action="../controller/setting.php" method="POST">
          <select class="form-control multi-lang" name="language" onchange="this.form.submit()">
            <option value="en" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') echo "selected"; ?>>En</option>
            <option value="ar" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') echo "selected"; ?>>AR</option>
          </select>
        </form>
        </li>
      </ul>
    </div>
  </div>
</nav>