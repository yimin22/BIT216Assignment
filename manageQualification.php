 <!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Qualification</title>
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

?>

<div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form id="getQualification" method="GET">
                      <input id="getQualiBtn"type="submit" style="visibility: hidden;">
                    </form>
                    <form method="POST" id="signup-form" name="SetUpQualification" class="signup-form">
                        <h2 class="form-title">Manage Qualification</h2>
                        <div class="form-group">
													<select id="QualificationSelect" class="form-input" name="Qualification" form="getQualification">
                            <?php

                            $Qualifications = $connect->query("SELECT qualificationID AS ID, qualificationName AS Name FROM qualification");
                            if(!isset($_GET['Qualification']))
                            {echo "<option selected disabled>Please choose a qualification</option>";
                              foreach($Qualifications as $Qualification){
                                echo "<option value=".$Qualification['ID'].">".$Qualification['Name']."</option>";
                              }}
                            else{
                              $qualificationInfo = $connect->query("SELECT * FROM qualification WHERE qualificationID = ".$_GET['Qualification']);
                              foreach($Qualifications as $Qualification){
                              echo "<option value=".$Qualification['ID'].($Qualification['ID']==$_GET['Qualification']?" selected":"").">".$Qualification['Name']."</option>";
                            }while( $row = $qualificationInfo->fetch_assoc()){
                              $QID = $_GET['Qualification'];
                              $minScore = $row['minimumScore'];
                              $maxScore = $row['maximumScore'];
                              $resultCalc = $row['resultCalcDescription'];
                              $grade = str_replace(',',PHP_EOL,$row['gradeList']);
                            }}

														if(isset($_POST['qualificationID'])){
														  $sql = "UPDATE qualification SET minimumScore=".$_POST['minScore'].", maximumScore=".$_POST['maximumScore'].", resultCalcDescription=".warpQuote($_POST['resultCalcDescription']).", gradeList=".warpQuote(str_replace(PHP_EOL,',',$_POST['gradeList']))." WHERE qualificationID=".$_POST['qualificationID']."";

														  $connect->query($sql);
														  header("Location: index.php");
															exit();

														}

                            ?>
													</select>
                        </div>
												<?php if(isset($_GET['Qualification'])){?>
                        <div class="form-group">
                            <input type="number" class="form-input" name="minScore" placeholder="Minimum Score" value="<?php echo $minScore ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="maximumScore" id="maximumScore" placeholder="Maximum Score" value="<?php echo $maxScore ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="resultCalcDescription" id="resultCalcDescription" placeholder="Description of the result calculation" value="<?php echo $resultCalc ?>" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" cols="50" class="form-input" name="gradeList" id="gradeList" placeholder="List of Grading System"><?php echo $grade ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-submit submit2 " name="qualificationID value="<?php echo warpQuote($QID); ?>"">Update</button>
                        </div>
											<?php } ?>
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
<script  type="text/javascript">
$('#QualificationSelect').change(function(){
            $('#getQualiBtn').click();
})
</script>
</body>
</html>
