<!DOCTYPE html>
<html>
    <head>
        <title>My first PHP Website</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="nav navbar-default">
      <div class="container">
        <h3 class="navbar-header">Registration Page</h3>
        <button class="btn btn-default pull-right" style=" margin-top: 10px"><a href="index.php">Back</a></button>
      </div>
    </div><br><br>


<form class="form-horizontal form_struct" style="display: table; margin: 0 auto; padding: 30px; background-color: gainsboro;" action="register.php" method="POST" >
  <fieldset>
    <legend>Register Here</legend>
    <div class="form-group">
      <label for="inputUsername" class="col-lg-3 control-label pull-left">Username</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" required="required">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label pull-left">Email</label>
      <div class="col-lg-9">
        <input type="Email" class="form-control" id="inputEmail" placeholder="Email" name="email" required="required">
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
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </div>
  </fieldset>
</form>

     </div>
    </body>
</html>

<?php

//database connetction mysqli_connect("server_name", "username", "password", "db_name");
$conn = mysqli_connect("localhost","root","","project");

//check if server_method post is set or not.....
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
  $bool = true;

  $query =  mysqli_query($conn, "SELECT * FROM register");
  while($row = mysqli_fetch_array($query))
  {
    //check username already exist......
      $table_username = $row["username"];
      if($username == $table_username)
      {
        $bool = false;
        print '<script> alert("UserName Not Available");</script>';
        print '<script> window.location.assign("register.php");</script>';
      }

      //check email already exists......
      $table_email = $row["email"];
      if($email == $table_email)
      {
        $bool = false;
        print '<script> alert("Email Already Register");</script>';
        print '<script> window.location.assign("register.php");</script>';
      }
  }

//insert register details in database
  if($bool)
  {
    mysqli_query($conn, "insert into register (username, email, password) value('$username', '$email', '$password')");
    print '<script> alert("Register Successfully");</script>';
    print '<script> window.location.assign("register.php");</script>'; 
  }

}

?>