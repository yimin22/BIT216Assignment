<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="JOMUNI project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<!-- Main css -->
<link rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
</head>

<body>

<div class="super_container">
<?php
include("server.php");
$page_title = $LOGIN;
include("logincode.php");
include("header.php");

if(isset($_POST["username"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = $connect->query("SELECT * FROM userlogin WHERE username LIKE '".$username."'");
  $foundUser = $sql->num_rows;
  $compare = mysqli_fetch_assoc($sql);
  if($foundUser>0)
  {
	   if($compare["password"] = $password){
		      $_SESSION['logged'] = $username;
		      $_SESSION['type'] = $compare['type'];
					if($compare['type'] = "Applicant"){
						$_SESSION['type'] == $APPLICANT;
					} elseif($compare['type'] = "UniversityAdmin"){
						$_SESSION['type'] == $UNIVERSITY_ADMIN;
					} else{
						$_SESSION['type'] == $SYSTEM_ADMIN;
					}
          header("Location: index.php");
		      exit();
	     } else{
         echo "<script type='text/javascript'>alert('Incorect password! Please try again');</script>";
         unset($password);
       }
  }else{
    echo "<script type='text/javascript'>alert('Incorect username! Please try again');</script>";
    unset($username);
    unset($password);
  }
}
 ?>

<!--Content-->
<div class="main">
        <section class="login" >
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content" >
                    <form method="POST" id="login-form" class="login-form">
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="Username" required <?php echo (isset($username))?"value=".warpQuote($username):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required>
                            <span toggle="#password" class="zmdi zmdi-eye-off field-icon toggle-password"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="form-submit submit2" >Login</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Haven't register yet? <a href=signup.php class="loginhere-link">Register here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>


<?php include("footer.php")?>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
