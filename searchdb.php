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
    $sessionRole = $_SESSION["role"];
    if (isset($_GET['submit'])) {
      $conn = new mysqli("localhost", "root", "", "web");
      $username = $_GET["search"];
      $sql = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
      $result = $conn->query($sql);
        
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class='del-wrap'><b>Name</b>: ". $row['username'] . "&nbsp;&nbsp; <b>Role</b>: ". $row['role'] . "</div>";
          if($sessionRole === "admin"){
            {
              echo "<div class='del-wrap'><a class='delete-user' href='delete_user.php?uid={$row['id']}'>Delete</a> <br /> <hr /></div>";
            }
          }
        }
      } else {
        echo "Sorry, no match found for ".$username."  ";
      }
    }
  ?>
  </div>
</body>
</html>

