<!DOCTYPE html>
<html lang="en">
<head>
<title>Record Programme</title>
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
include("defaultValues.php");
$type = $UNIVERSITY_ADMIN;
include("logincode.php");
if(isset($_SESSION['logged'])){
	include("headerLogin.php");
} else{
	 include("header.php");
}

if(isset($_POST['programmeName'])){
  $programmeCode = $_POST['programmeCode'];
  $programmeName = $_POST['programmeName'];
  $description = $_POST['description'];
  $closingDate = $_POST['closingDate'];
  $academicQualification = str_replace(PHP_EOL,',',$_POST['academicQualification']);

  echo "<script>console.log('".$programmeCode."')</script>";
  echo "<script>console.log('".$programmeName."')</script>";
  echo "<script>console.log('".$description."')</script>";
  echo "<script>console.log('".$closingDate."')</script>";
  echo "<script>console.log('".$academicQualification."')</script>";

	$getUniversityID = $connect->query("SELECT universityID FROM universityadmin WHERE userID LIKE (SELECT userID FROM users WHERE username LIKE '".$_SESSION['logged']."')")->fetch_assoc()['universityID'];
	echo "<script>console.log('".$getUniversityID."')</script>";
	$values = warpQuote($programmeCode).",".warpQuote($programmeName).",".warpQuote($description).",".warpQuote($closingDate).",".warpQuote($academicQualification).",".warpQuote($getUniversityID);
  $sql = "INSERT INTO programme (programmeCode, programmeName, description, closingDate, academicQualification, universityID) VALUES (" .$values.");";

  $query = $connect->query("SELECT programmeName FROM programme WHERE programmeName = '".$programmeName."';")->num_rows;

	if($query){
    $error = "$programmeName has been recorded!";
    echo "<script type='text/javascript'>alert('$error');</script>";
    unset($programmeName);
  }
  else{
    $connect->query($sql);
    //header("Location: index.php");
		exit();
  }
}

?>

<div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" id="signup-form" name="RecordProgramme" class="signup-form">
                        <h2 class="form-title">Record Programme</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="programmeCode" id="programmeCode" placeholder="Programme Code" required <?php echo isset($programmeCode)?"value=".warpQuote($programmeCode):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="programmeName" id="programmeName" placeholder="Programme Name" required <?php echo isset($programmeName)?"value=".warpQuote($programmeName):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="description" id="description" placeholder="Description" required <?php echo isset($description)?"value=".warpQuote($description):"";?>>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-input" name="closingDate" id="closingDate" placeholder="Closing Date" required <?php echo isset($closingDate)?"value=".warpQuote($closingDate):"";?>>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" cols="50" class="form-input" name="academicQualification" id="gradeList" placeholder="Academic Qualification"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-submit submit2 " value="<?php echo $PROGRAMME ?>">Submit</button>
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
