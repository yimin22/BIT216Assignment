<!DOCTYPE html>
<html lang="en">
<head>
<title>Apply Programme</title>
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
<style>
h2{
  padding-bottom: 1em;
}
label{
  font-size:1.5em;
}

.myQualification{
  position:inherit;
	width: 80em;
  height: auto;
  margin: 6em auto;
  border-radius: 1.5em;
  box-shadow: 0px 11px 35px 2px rgba(0.1, 0, 0, 0.2);
}

.myQualification-form{
  padding:2em;
}
</style>

<body>

<div class="super_container">
<?php
ob_start();
include("server.php");
include("defaultValues.php");
$type = $APPLICANT;
include("logincode.php");
if(isset($_SESSION['logged'])){
  include("headerLogin.php");}
  else{
      include("header.php");}
if(isset($_POST['applicationQualification'])){
  $qualification = $_POST['qualification'];
  $subjectName = $_POST['subName'];
  $grade = $_POST['grade'];


}
?>



<!--Content-->
<div class="main">
        <section class="myQualification" >
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="myQualification-content" >
                    <form method="POST" id="myQualification-form" class="myQualification-form">
                        <h2 class="form-title">My Qualification</h2>
                        <div class="form-group">
                          <label for="qualification">Qualification </label>
                          <select class="form-control" name="qualification" id="qualification">
                            <?php
                            $qualification = $connect->query("SELECT qualificationName AS qualificationname FROM qualification");
                            if(!isset($_GET["q"])){
                              echo "<option selected disabled> Please choose a qualification</option>";
                              foreach($qualification as $q){
                                echo "<option value=".$q['qualificationname'].">".$q['qualificationname']."</option>";
                              }}

                             ?>
                           </select>
                        </div>

                        <div class="form-group">
                          <label for="subName">Subject Name: </label>
                            <input type="text" class="form-input" name="subName" id="subName" placeholder="Subject Name" required<?php echo isset($subName)?"value=".warpQuote($subName):"";?>>
                        </div>

                        <div class="form-group">
                          <label for="grade">Grade: </label>
                          <input type="text" class="form-input" name="grade" id="grade" placeholder="Grade" required<?php echo isset($grade)?"value=".warpQuote($grade):"";?>>
                        </div>

                        <div class="form-group">
                            <button type="add" name="submit" id="add" class="form-submit submit2" >Add</button>
                        </div>
                        <div class="form-group">
                            <button type="cancel" name="cancel" id="cancel" class="form-submit submit2" >cancel</button>
                        </div>
                    </form>

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
