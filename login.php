<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    if (!empty($_REQUEST['username'])) {

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
 
        $query = "SELECT * FROM users WHERE username='".$username."' AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $row = $result->fetch_assoc();
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
        } else {
            echo "<div class='form login'>
                  <h3>Incorrect Username/password.</h3>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form login" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link login-p">Don't have an account? <a href="registration.php">Register New Account</a></p>
  </form>
<?php
    }
?>
</body>
</html>
