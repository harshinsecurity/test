<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Search Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"/>
</head>
<body>
<div class='search-page-wrapper'>
  <h1>Search results </h1>
  <?php
    require('db.php');
    include("auth_session.php");
    $sessionUsername = $_SESSION["username"];
    // $query = "SELECT FROM users WHERE username='$username'";
    // $result = mysqli_query($con, $query);
    $sessionRole = $_SESSION['role'];
    if (isset($_GET['submit'])) {
      $conn = new mysqli("localhost", "root", "", "web");
      $username = $_GET["search"];
      $sql = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
      $result = $conn->query($sql);
        
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<b>Name</b>: ". $row['username'] . "<br />";
          echo "<b>Role</b>: ". $row['role'] . "<br />";
          echo "<b>Session User</b>: ". $sessionUsername . "<br />";
          echo "<b>Session Role</b>: ". $sessionRole . "<br />";
          // if($sessionRole == "admin"){
          //   echo "<p class='btn btn-warning'>Delete</p>"
          // }
        }
      } else {
        echo "Sorry, no match found for ".$username."  ";
      }
    }
  ?>
  </div>
</body>
</html>

