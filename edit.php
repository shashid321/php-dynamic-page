<!DOCTYPE html>
<html>
    <head>
        <title>My first PHP Website</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
   <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   $id_exists = false;
   ?>
    <body>


    <div class="nav navbar-default">
      <div class="container">
      <div class="navbar-header">
        <h3 >Hello <?php print "$user"; ?> </h3>  </div>
        <button class="btn btn-default pull-right" style=" margin-top: 10px"><a href="logout.php">Log Out</a></button>
        <button class="btn btn-default pull-right" style=" margin-top: 10px;margin-right: 10px"><a href="home.php">Home</a></button>
    </div>
    </div><br><br>
    <div class="container">

        
    <h2 align="center">Currently Selected</h2>
    <table class="table table-hover" width="100%">
      <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post Time</th>
        <th>Edit time</th>
        <th>Public Post</th>
      </tr>
      <?php
      if(!empty($_GET['id']))
      {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        $id_exists = true;
        $conn = mysqli_connect("localhost","root","","project");
        $query = mysqli_query($conn, "SELECT * FROM reg2 WHERE id = '$id'");
          $count = mysqli_num_rows($query);
          if($count > 0)
           {
              while($row = mysqli_fetch_array($query))
              {
                print "<tr>";
                print "<th align=center>".$row['id']."</th>";
                print "<th align=center>".$row['detail']."</th>";
                print "<th align=center>".$row['date_posted']." - ". $row['time_posted']."</th>";
                print "<th align=center>".$row['date_edited']." - ". $row['time_edited']."</th>";
                print "<th align=center>".$row['public']."</th>";
                print "</tr>";
              }
            }
            else
            {
              $id_exists = false;
            }
      }
      ?>
    </table>
    <br />
    <?php 
      if($id_exists)
      {
        print '
<form class="form-horizontal" action="edit.php" method="POST" style="display: table; margin: 0 auto; padding: 30px; background-color: gainsboro;">
  <fieldset>
    <legend>ADD POSTS</legend>
    <div class="form-group">
      <label for="inputDetail" class="col-lg-4 control-label">ADD Details</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" id="inputDetail" placeholder="Details" name="details">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="public[]" value="yes" > Public post?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-4">
        <button type="reset" class="btn btn-default">Clear</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </fieldset> ';
      }
      else
      {
        print '<h2 align = "center">There id no data to be edited.</h2>';
      }
    ?>
    </body>
    </html>

    <?php
    
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
          $conn = mysqli_connect("localhost","root","","project");
          $detail = mysqli_real_escape_string($conn, $_POST['details']);

          $public = "no";
          $id = $_SESSION['id'];
          
          $time = strftime("%X");
          $date = strftime("%B %d, %Y");

          foreach($_POST['public'] as $list)
          {
            if($list != null)
            {
              $public = "yes";
            }
          } 
          mysqli_query($conn, "UPDATE reg2 SET detail = '$detail', public = '$public', date_edited = '$date', time_edited = '$time' WHERE id = '$id'");
        header("location: home.php");
        }
    ?>
    <!--
        <form action="edit.php" method = "POST">
        Enter new detail: <input type="text" name="details" /> <br/>
           Public post? : <input type="checkbox" name="public[]" value="yes" /> <br/>
           <input type="submit" value="update list"/>
        </form>-->