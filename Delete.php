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
$username = $_SESSION["username"];
$sql = "DELETE FROM users WHERE username='$username'";
if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
    session_destroy();
    header("Location: login.php");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>
