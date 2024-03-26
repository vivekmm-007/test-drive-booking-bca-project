<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
</head>
<body>
    <div class="login">

<?php
require('db.php');
if (isset($_POST['username']))
{
    $var = 0;
    if(isset($_POST['Email']))
    {
    $username = ($_POST['username']);
    $Email = ($_POST['Email']);
    $password = ($_POST['password']);
    $checkEmail = "SELECT * FROM users WHERE Email = '$Email'";
    $checkUsername = "SELECT * FROM users WHERE username = '$username'";

    if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
    {
        $msg = 'The Email you have entered is invalid, please try again.';
        echo $msg;
    }else{

        $resultEmail = mysqli_query($conn, $checkEmail);
        $resultUsername = mysqli_query($conn, $checkUsername);

        if (mysqli_num_rows($resultEmail) > 0) {
            $msg = 'The Email you have entered already exists, please try again.';
            echo $msg;
        } else if (mysqli_num_rows($resultUsername) > 0) {
            $msg = 'The Username you have entered already exists, please try again.';
            echo $msg;
        } else {
            $query = "INSERT INTO `users` (`username`, `password`, `Email`) VALUES ('$username', '$password', '$Email');";
            $result1 = mysqli_query($conn,$query);

            if($result1)
            {
                echo "<div class='form'><h3>You have registered successfully.</h3><br><br><br/>Click here to start <a href='start.php'>Login</a></div>";
            }
        }
    }
}
$conn->close();
}
else {
?>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #222;
  background-image: url('ui.jpeg');
 background-size: cover; 
 }
 
 .login {
    position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   background-color: rgba(0, 0, 0, 0.3);
   padding: 20px;
   border-radius: 20px;
   max-width: 300px;
   width: 100%;
   text-align: center;
 }
 
 h1 {
  text-align: center;
  color: white;
 }
 
 form {
  display: flex;
  flex-direction: column;
  align-items: center;
 }
 
 input[type="text"], input[type="password"], input[type="Email"] {
    width: 100%;
   padding: 12px 20px;
   margin: 8px 0;
   box-sizing: border-box;
   border-radius: 20px; 
 }
 
 input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  width: 100%;
  margin-top: 16px;
 }
 .form input[type="submit"]:hover {
   background-color: #45a049;
}
    </style>
<div class="form">
<h1>Sign Up</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="Email" name="Email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Sign Up" />
</form>
</div>
<?php } ?>
</body>
</html>