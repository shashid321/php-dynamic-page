<!DOCTYPE html>
<html>
    <head>
        <title>My first PHP Website</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="nav navbar-default">
      <div class="container">
        <h3 class="navbar-header">LogIn Page</h3>
        <button class="btn btn-default pull-right" style=" margin-top: 10px"><a href="index.php">Back</a></button>
      </div>
    </div><br><br>

<form class="form-horizontal" style="display: table; margin: 0 auto; padding: 30px; background-color: gainsboro;" action="checklogin.php" method="POST" >
  <fieldset>
    <legend>LogIn Here</legend>
    <div class="form-group">
      <label for="inputUsername" class="col-lg-3 control-label pull-left">Username</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" required="required">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-3 control-label pull-left">Password</label>
      <div class="col-lg-9">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required="required">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="reset" class="btn btn-default">Clear</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </fieldset>
</form>
    </body>
</html>