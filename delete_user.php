<?php
    $con = mysqli_connect("localhost","root","","web");
include("auth_session.php");
?>
<html>
    <body>
        <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
    </body>
</html>

<?php
    $currUserId = isset($_GET['uid']) ? $_GET['uid'] : '';
    $query = "DELETE FROM users WHERE id='$currUserId'";
    if (mysqli_query($con, $query)) {
        echo "Record deleted successfully";
        header("Location: dashboard.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
?>