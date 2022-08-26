<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <!-- <p>Hello, <?php echo $_SESSION['username']; ?>!</p> -->
        

        
            <?php
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            echo "Good morning " , $_SESSION['username'];
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            echo "Good afternoon " , $_SESSION['username'];
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            echo "Good evening " , $_SESSION['username'];
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            echo "Good night " , $_SESSION['username'];
        }
        ?>
        
        <p>Welcome to your dashboard </p>

        <p><a href="logout.php">Logout</a></p>
    </div>
    <form action="searchdb.php" method="get">
		<input
			type="text"
			placeholder="Search Tab"
			name="search"
			required>
		<button type="submit" name="submit">Search</button>
	</form>

    <a href="Delete.php" class="btn btn-warning">Delete Account</a>

</body>
</html>
