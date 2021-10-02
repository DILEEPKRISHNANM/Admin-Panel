<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: eventlist.php");
  exit;
}

require_once "php/connect.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if(empty(trim($_POST["username"]))){
      $username_err = "Please enter username.";
  } else{
      $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if(empty(trim($_POST["password"]))){
      $password_err = "Please enter your password.";
  } else{
      $password = trim($_POST["password"]);
  }

  if (empty($username_err) && empty($password_err)) {

    $sql = "SELECT a_user, a_pass FROM admin WHERE a_user = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

      mysqli_stmt_bind_param($stmt, "s", $param_username);

      $param_username = $username;

      if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt,$username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if ($password == $hashed_password) {
              session_start();

              $_SESSION["loggedin"] = true;
              // $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              header("location: index.php");
            } else {
              $login_err = "Invalid username or password.";
            }
          }
        } else {
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      mysqli_stmt_close($stmt);
    }
  }
  mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event portal</title>
    <link rel="stylesheet" href="http://localhost/Admin-Panel/css/loginstyles-a.css">
</head>
<header>
</header>
<body>
    <div class="loginbox">
    <!-- form for login details start here -->
    <form action="adminlogin.php" method="post">
        <div class="imgcontainer">
               <p class="main-h">Admin login</p>
        </div>
      
        <div class="container">
          <label for="uname">Username</label>
          <input type="text" placeholder="Enter Username" name="username" id="uname" required class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
          <span class="invalid-feedback"><?php echo $username_err; ?></span>
          <label for="psw">Password</label>
          <input type="password" placeholder="Enter Password" name="password" id="psw" required class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
          <span class="invalid-feedback"><?php echo $password_err; ?></span>
          <button type="submit">Login</button>
        </div>
    </div>
      <!-- form for login details end here -->
</body>
</html>