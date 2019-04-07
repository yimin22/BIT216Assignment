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

.applyProgramme{
  position:inherit;
	width: 80em;
  height: auto;
  margin: 6em auto;
  border-radius: 1.5em;
  box-shadow: 0px 11px 35px 2px rgba(0.1, 0, 0, 0.2);
}

.applyProgramme-form{
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
if(isset($_POST['applyProgramme'])){
  $programmeName = $_POST['programmeName'];

}
?>



<!--Content-->
<div class="main">
        <section class="applyProgramme" >
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="applyProgramme-content" >
                    <form method="POST" id="applyProgramme-form" class="applyProgramme-form">
                        <h2 class="form-title">Apply Programme</h2>
                        <div class="form-group">
                          <label for="uniName">Select university (Select One):</label>
                          <select class="form-control" name="universityName" id="uniName">

                            <?php
                            $university = $connect->query("SELECT universityName AS universityname FROM university");
                            if(!isset($_GET['uni']))
                            {echo "<option selected disabled>Please choose a university</option>";
                              foreach($university as $uni){
                                echo "<option value=".$uni['universityname'].">".$uni['universityname']."</option>";
                              }}
                            else{
                              $uniInfo = $connect->query("SELECT * FROM university WHERE universityID = ".warpQuote($_GET['uni']));
                              foreach($university as $uni){
                              echo "<option value=".warpQuote($uni['universityname']).($uni['code']==$_GET['uni']?" selected>":">").$uni['universityname']."</option>";
                            }}
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="programmeName">Select Programme (Select One):</label>
                          <select class="form-control" name="programmeName" id="programmeName">

                            <?php
                            $selectProgrammeName = $connect->query("SELECT programmeName AS name FROM programme  WHERE university = (SELECT universityname FROM university) ");
                            if(!isset($_GET['programme']))
                            {echo "<option selected disabled>Please choose a programme</option>";
                              foreach($programmeName as $programme){
                                echo "<option value=".$programme['programmeName'].">".$programme['programmeName']."</option>";
                              }}

                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <input type="text" class="form-input" name="description" id="description" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                          <label for="closingDate">Closing Date</label>
                          <input type="date" class="form-input" name="closingDate" id="closingDate" placeholder="Closing Date" value="<?php echo $closeDate ?>" required>

                        </div>
                        <div class="form-group">
                          <label for="academicQualification">Academic Qualification</label>
                          <input type="text" class="form-input" name="academicQ" id="academicQ" placeholder="Academic Qualification" placeholder="academicQualification" required>

                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="form-submit submit2" >Apply</button>
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
