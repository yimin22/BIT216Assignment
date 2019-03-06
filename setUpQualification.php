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
include("server.php");
include("header.php");


$checkUserType = "SELECT type FROM userType";


if($connect->query($checkUserType) == "SystemAdmin"){
  $sql = "INSERT INTO qualification ('qualificationName', 'minimumScore', 'maximumScore', 'operator', 'totalSubject', 'gradeList')
  VALUES ('$_POST[qualificationName]', '$_POST[minimumScore]','$_POST[operator]', '$_POST[totalSubject]', '$_POST[gradeList]')";

  if(!mysql_query($sql, $connect)){
    echo"Error";
  }
  echo "Successful";
}

?>

<div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" name="SetUpQualification" class="signup-form">
                        <h2 class="form-title">Set Up Qualification</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="qualificationName" id="qualificatonName" placeholder="Qualification Name"/>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="minimumScore" id="minimumScore" placeholder="Minimum Score"/>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="maximumScore" id="maximumScore" placeholder="Maximum Score"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="operator" id="operator" placeholder="Operator (AVG/SUM)"/>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="totalSubject" id="totalSubject" placeholder="Total of Subjects"/>
                        </div>
                        <div class="form-group">
                            <textarea form="gradeList" rows="3" cols="50" class="form-input" name="gradeList" placeholder="List of Grading System"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="form-submit submit2 ">Submit</button>
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
