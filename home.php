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
   ?>
    <body>

    <div class="nav navbar-default">
      <div class="container">
      <div class="navbar-header">
        <h3 >Hello <?php print "$user"; ?> </h3>  </div>
        <button class="btn btn-default pull-right" style=" margin-top: 10px"><a href="logout.php">Log Out</a></button>
     
    </div>
    </div><br><br>
    <div class="container">
<form class="form-horizontal" action="add.php" method="POST" style="display: table; margin: 0 auto; padding: 30px; background-color: gainsboro;">
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
      <!--  <form action="add.php" method="POST">
           Add more to list: <input type="text" name="details" /> <br/>
           Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
           <input type="submit" value="Add to list"/>
        </form>-->
    <h2 align="center">My list</h2>
    <table width="100%" class="table table-hover">
      <tr>
        <th>ID</th>
        <th>Detail</th>
        <th>Time Posted</th>
        <th>Time Edited</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Public Post</th>
      </tr>
      <?php
      $conn = mysqli_connect("localhost","root","","project");
      $query =mysqli_query($conn, "SELECT * FROM reg2");
      while($row = mysqli_fetch_assoc($query)){
      print "<tr>";
      print "<th align=center>".$row['id']."</th>";
      print "<th align=center>".$row['detail']."</th>";
      print "<th align=center>".$row['date_posted']." - ". $row['time_posted']."</th>";
      print "<th align=center>".$row['date_edited']." - ". $row['time_edited']."</th>";
      print "<th align=center><a href = 'edit.php?id=".$row["id"]."'>Edit</a></th>";
      print '<th align=center><a href = "#" onclick = "myFunction('.$row['id'].')">Delete</a></th>';
      print "<th align=center>".$row['public']."</th>";
      }
      print "</tr>";
      ?>
    </table>
    <script>
    function myFunction(id)
    {
       var r = confirm("Are you sure you want to delete this record?");
       if(r == true)
       {
          window.location.assign("delete.php?id=" + id);
       }
    }
</script>
</div>
    </body>
    </html>



