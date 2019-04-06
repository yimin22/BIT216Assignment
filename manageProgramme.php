<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Programme</title>
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
$type = $UNIVERSITY_ADMIN;
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
                    <form id="getProgramme" method="GET">
                      <input id="getProgBtn"type="submit" style="visibility: hidden;">
                    </form>
                    <form method="POST" id="signup-form" name="recordProgramme" class="signup-form">
                        <h2 class="form-title">Manage Programme</h2>
                        <div class="form-group">
													<select id="ProgrammeSelect" class="form-input" name="Programme" form="getProgramme">
                            <?php
                            $Programmes = $connect->query("SELECT programmeCode AS code, programmeName AS name FROM programme WHERE universityID = (SELECT universityID FROM universityadmin WHERE userID LIKE (SELECT userID FROM users WHERE username LIKE '".$_SESSION['logged']."'))");
                            if(!isset($_GET['Programme']))
                            {echo "<option selected disabled>Please choose a programme</option>";
                              foreach($Programmes as $Programme){
                                echo "<option value=".$Programme['code'].">".$Programme['name']."</option>";
                              }}
                            else{
                              $programmeInfo = $connect->query("SELECT * FROM programme WHERE programmeCode = ".warpQuote($_GET['Programme']));
                              foreach($Programmes as $Programme){
                              echo "<option value=".warpQuote($Programme['code']).($Programme['code']==$_GET['Programme']?" selected>":">").$Programme['code']."</option>";
                            }while( $row = $programmeInfo->fetch_assoc()){
															$progName = $row['programmeName'];
                              $desc = $row['description'];
                              $closeDate = $row['closingDate'];
                              $acaQuali = str_replace(',',PHP_EOL,$row['academicQualification']);
                            }}

														if(isset($_POST['programmeCode'])){
														  $sql = "UPDATE programme SET programmeName=".warpQuote($_POST['programmeName']).", description=".warpQuote($_POST['description']).", closingDate=".warpQuote($_POST['closingDate']).", academicQualification=".warpQuote(str_replace(PHP_EOL,',',$_POST['academicQualification']))." WHERE programmeCode=".warpQuote($_POST['programmeCode']).";";

														  $connect->query($sql);
														  header("Location: index.php");
															exit();

														}
                            ?>
													</select>
                        </div>
												<?php if(isset($_GET['Programme'])){?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="programmeName" id="programmeName" placeholder="Programme Name" value="<?php echo $progName ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="description" id="description" placeholder="Description" value="<?php echo $desc ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-input" name="closingDate" id="closingDate" placeholder="Closing Date" value="<?php echo $closeDate ?>" required>
														<span class="name">**Closing Date**</span>
												</div>
                        <div class="form-group">
                            <textarea rows="3" cols="50" class="form-input" name="academicQualification" id="gradeList" placeholder="Academic Qualification"><?php echo $acaQuali ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-submit submit2 " name="programmeCode" value="<?php echo $_GET['Programme'] ?>">Update</button>
                        </div>
											<?php }?>
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
$('#ProgrammeSelect').change(function(){
            $('#getProgBtn').click();
})
</script>
</body>
</html>
