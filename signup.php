<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign Up</title>
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
$page_title = $SIGNUP;
include("header.php");

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['re_password'];
	$fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $idNum = $_POST['id_num'];
  $idType= $_POST['id_type'];
	$mobileNum = $_POST['mobile_no'];
  $dateOfBirth = $_POST['dateOfBirth'];

  if($repassword == $password){
      $userValue = warpQuote($username).",".warpQuote($password).",".warpQuote($fullname).",".warpQuote($email);
      $sql1 = "INSERT INTO users (username, password, fullname, email) VALUES (".$userValue.");";
      $query = $connect->query("SELECT username FROM users WHERE username = '".$username."';")->num_rows;
      //echo "<script>console.log('Query : ".$query."')</script>";
      if($query){
        $error = "$username has been taken!";
        echo "<script type='text/javascript'>alert('$error');</script>";
        unset($username);
      }
      else{
        $connect->query($sql1);
        //echo "<script>console.log('54')</script>";
        $selectUserID = mysqli_fetch_assoc($connect->query("SELECT userID FROM users WHERE username = '".$username."';"));
        //echo "<script>console.log('56')</script>";
        //echo "<script>console.log('".$selectUserID['userID']."')</script>";
        $applicantValue = $idNum.",".warpQuote($idType).",".warpQuote($dateOfBirth).",".$mobileNum.",".$selectUserID['userID'];
        //echo "<script>console.log('".$applicantValue."')</script>";
        $sql2 = "INSERT INTO applicant (IDNumber, IDType, dateOfBirth, mobileNo, userID) VALUES (".$applicantValue.");";
        //echo "<script>console.log('".$sql2."')</script>";
        $connect->query($sql2);
				$_SESSION['logged']=$username;
        header("Location: index.php");
        exit();
      }
    } else {
        $error = "Password re-enter incorrect!";
        echo "<script type='text/javascript'>alert('$error');</script>";
        unset($password);
        unset($repassword);}
    }
?>

<!--Content-->
<div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="Username" required <?php echo isset($username)?"value=".warpQuote($username):""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required <?php echo isset($password)?"value=".warpQuote($password):""; ?>>
                            <span toggle="#password" class="zmdi zmdi-eye-off field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" required <?php echo isset($repassword)?"value=".warpQuote($repassword):""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="fullname" id="fullname" placeholder="Full Name" required <?php echo isset($fullname)?"value=".warpQuote($fullname):""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" required <?php echo isset($email)?"value=".warpQuote($email):""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="id_num" id="id_num" placeholder="ID Number" required <?php echo isset($idNum)?"value=".$idNum:""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="id_type" id="id_type" placeholder="ID Type (IC / Passport)" required <?php echo isset($idType)?"value=".warpQuote($idType):""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-input" name="dateOfBirth" id="dateOfBirth" placeholder="Date of Birth" required <?php echo isset($dateOfBirth)?"value=".warpQuote($dateOfBirth):""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-input" name="mobile_no" id="mobile_no" placeholder="Mobile Number" required <?php echo isset($mobileNum)?"value=".$mobileNum:""; ?>>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="form-submit submit2" value="<?php echo $USERS ?>">Submit</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have an account ? <a href=login.php class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>


<?php include("footer.php")?>

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
