<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"/>
</head>
<body>
    <div class="form login-dashboard">
        <!-- <p>Hello, <?php echo $_SESSION['username']; ?>!</p> -->
        <h1>Welcome to your dashboard </h1>
        
        <p class="greeting">
            <?php
                /* This sets the $time variable to the current hour in the 24 hour clock format */
                $time = date("H");
                /* Set the $timezone variable to become the current timezone */
                $timezone = date("e");
                /* If the time is less than 1200 hours, show good morning */
                if ($time < "12") {
                    echo "Good morning " , $_SESSION['username'], "!";
                } else
                /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                if ($time >= "12" && $time < "17") {
                    echo "Good afternoon " , $_SESSION['username'], "!";
                } else
                /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                if ($time >= "17" && $time < "19") {
                    echo "Good evening " , $_SESSION['username'], "!";
                } else
                /* Finally, show good night if the time is greater than or equal to 1900 hours */
                if ($time >= "19") {
                    echo "Good night " , $_SESSION['username'], "!";
                }
            ?>
            <?php
                if(isset($_FILES['image'])){
                    $info = pathinfo($_FILES['image']['name']);
                    $ext = $info['extension']; // get the extension of the file
                    $newname = $_SESSION["username"]. "." .$ext; 

                    $target = 'uploads/'.$newname;
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                        echo "The file ". basename( $_FILES["image"][$fileName]). " has been uploaded :)";
                    } else {
                        echo "Sorry, there was an error uploading your file :(";
                    }
                    $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                }
            ?>
        </p>
    
        
         <form action="searchdb.php" method="get">
            <div class="content">
                <input
                    class="search-input"
                    type="text"
                    placeholder="Search Tab"
                    name="search"
                    required>
                <button type="submit" name="submit" class="search-btn">Search</button>
            </div>
        </form>

        <div class="content">
            <img  class="user-img" src="<?php echo 'uploads/'.$_SESSION["username"]. ".jpeg"; ?>">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" class="file-input" name="image" id="image"/>
                <input class="upload-btn" type="submit"/>
            </form>
        </div>

        <div class="btn-wrapper">
            <a href="Delete.php" class="btn btn-warning">Delete My Account</a>
            <a href="logout.php" class="btn btn-warning">Logout</a>
        </div>
    </div>
</body>
</html>
