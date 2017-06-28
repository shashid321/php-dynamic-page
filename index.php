
<html>
    <head>
        <title>My first PHP Website</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="nav navbar-default ">
    <div class="container">
        <h3 class="navbar-header">Hello World!</h3>
        
        <button class="btn btn-defalt pull-right" style="margin-top: 10px; margin-left: 20px"> <a href="login.php" style="text-decoration: none"><span style="font-weight: 800; font-size: 12px;"> Login </span></a></button>
        <button class="btn btn-defalt pull-right" style=" margin-top: 10px"> <a href="register.php" style="text-decoration: none"><span style="font-weight: 800; font-size: 12px"> Register</span> </a></button>
        </div>
    </div> 
    
    <div class="container">
     <h2 align="center">My list</h2>
    <table class="table" width="100%">
      <tr>
        <th>ID</th>
        <th>Detail</th>
        <th>Time Posted</th>
        <th>Time Edited</th>
      </tr>
      <?php  
      $conn = mysqli_connect("localhost","root","","project");
      $query =mysqli_query($conn, "SELECT * FROM reg2 WHERE public = 'yes'");
      while($row = mysqli_fetch_array($query)){
      print "<tr>";
      print "<th align=center>".$row['id']."</th>";
      print "<th align=center>".$row['detail']."</th>";
      print "<th align=center>".$row['date_posted']." - ". $row['time_posted']."</th>";
      print "<th align=center>".$row['date_edited']." - ". $row['time_edited']."</th>";
      print "</tr>";
      }
      ?>
    </table>
    </div>
    </body>
</html> 