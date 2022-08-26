<?php
    if (isset($_GET['submit'])) {
        $conn = new mysqli("localhost", "root", "", "web");
       $username = $_GET["search"];
       $sql = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<b>Name</b>: ". $row['username'] . "<br />";
        }
      } else {
        echo "Sorry, no match found for ".$username."  ";
      }
}
?>
