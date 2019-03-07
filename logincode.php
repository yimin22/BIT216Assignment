<?php
include("server.php");
$email = $password = $pwd = '';

if(isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
  $result = mysqli_query($connect, $sql);
  if(mysqli_num_rows($result) > 0)
  {
	   while($row = mysqli_fetch_assoc($result))
	    {
		      $id = $row["ID"];
		      $username = $row["username"];
		      session_start();
		      $_SESSION['id'] = $id;
		      $_SESSION['username'] = $username;
	     }
	     header("Location: userpage.php");
  }

  else
  {
	   $error= "Invalid username or password";
     echo"<script type='text/javascript'>
               alert ('$error');
               </script>";
     unset($username);
     unset($password);
  }
}
?>
