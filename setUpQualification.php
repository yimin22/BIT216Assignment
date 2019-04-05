<!DOCTYPE html>
<html lang="en">
<head>
<title>Set Up Qualification</title>
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
ob_start();
include("server.php");
include("defaultValues.php");
$type = $SYSTEM_ADMIN;
include("logincode.php");
if(isset($_SESSION['logged'])){
	include("headerLogin.php");
} else{
	 include("header.php");
}

if(isset($_POST['qualificationName'])){
  $qualificationName = $_POST['qualificationName'];
  $minimumScore = $_POST['minimumScore'];
  $maximumScore = $_POST['maximumScore'];
  $resultCalcDescription = $_POST['resultCalcDescription'];
  $gradeList = str_replace(PHP_EOL,',',$_POST['gradeList']);

	$values = warpQuote($qualificationName).",".$minimumScore.",".$maximumScore.",".warpQuote($resultCalcDescription).",".warpQuote($gradeList);
  $sql = "INSERT INTO qualification (qualificationName, minimumScore, maximumScore, resultCalcDescription, gradeList) VALUES (" .$values.");";

  $query = $connect->query("SELECT qualificationName FROM qualification WHERE qualificationName = '".$qualificationName."';")->num_rows;

	if($query){
    $error = "$qualificationName has been recorded!";
    echo "<script type='text/javascript'>alert('$error');</script>";
    unset($qualificationName);
  }
  else{
    $connect->query($sql);
    header("Location: index.php");
		exit();
  }
}

?>

<div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" id="signup-form" name="SetUpQualification" class="signup-form">
                        <h2 class="form-title">Set Up Qualification</h2>
                        <div class="form-group">
													<input type="text" class="form-input" name="qualificationName" id="qualificatonName" placeholder="Qualification Name" required <?php echo isset($qualificationName)?"value=".warpQuote($qualificationName):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="minimumScore" id="minimumScore" placeholder="Minimum Score" required <?php echo isset($minimumScore)?"value=".warpQuote($minimumScore):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="maximumScore" id="maximumScore" placeholder="Maximum Score" required <?php echo isset($maximumScore)?"value=".warpQuote($maximumScore):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="resultCalcDescription" id="resultCalcDescription" placeholder="Description of the result calculation" required <?php echo isset($resultCalcDescription)?"value=".warpQuote($resultCalcDescription):"";?>>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" cols="50" class="form-input" name="gradeList" id="gradeList" placeholder="List of Grading System"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-submit submit2 " value="<?php echo $QUALIFICATION ?>">Submit</button>
                        </div>
                    </form>
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
