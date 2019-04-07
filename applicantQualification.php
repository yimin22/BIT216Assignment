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
button .cancel{
  background-color: white;
}
.form-submit submit3{
  background-color: white;
}

.recordQuaTable
{
	font-family: 'Questrial',cursive;
  border-collapse: collapse;
	width: 70%;
	margin: auto;
  box-shadow: 0px 11px 35px 2px rgba(0.1, 0, 0, 0.2);


}
th{
  text-align: left;
  padding: 8px;
  color: black;
  font-weight: bolder;
  font-family: 'Questrial',cursive;
  background-color: PeachPuff;
  font-size: 20px;
  border: 2px solid #ccc;
  border-color: PeachPuff ;


}
.titleTable{
  text-align: center;
  margin-top: 10px;
  margin-bottom: 5px;
}
td{
  background-color: white;
  font-size: 18px;
  padding-left: 20px;
  border: 2px solid #ccc;
  border-color: PapayaWhip;
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
  $qualification = $_POST['qualificationName'];
  $subjectName = $_POST['subName'];
  $grade = $_POST['grade'];
  $getQuaID = mysqli_fetch_assoc($connect->query("SELECT qualificationID FROM qualification WHERE qualificationName = '".$qualificationName."';"))->fetch_assoc()['qualificationID'];
  $getApplicantID = mysqli_fetch_assoc($connect->query("SELECT applicantID FROM applicant WHERE applicantID=(SELECT applicantID FROM applicant WHERE userID LIKE (SELECT userID FROM users WHERE username LIKE '".$_SESSION['logged']."'))"))->fetch_assoc()['applicantID'];
  $resultValue = warpQuote($applicantID).",".warpQuote($qualification).",".warpQuote($subjectName).",".warpQuote($grade).",".warpQuote($qualificationID);

  $sql = $connect->query("INSERT INTO results (applicantID, qualification, subName, grade, qualificationID) VALUES (".$resultValue.");");
  $connect->query(sql);
	echo "<script>console.log('".$getapplicantID."')</script>";
  echo "<script>console.log('".$getQuaID."')</script>";

}
$results = $connect->query("SELECT * FROM results WHERE applicantID =(SELECT applicantID FROM applicant WHERE userID LIKE (SELECT userID FROM users WHERE username LIKE '".$_SESSION['logged']."'))");
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
                            <button type="add" name="submit" id="add" class="form-submit submit2" value="<?php echo $RESULT ?>">Add</button>
                        </div>
                        <div class="form-group">
                            <button type="cancel" name="cancel" id="cancel" class="form-submit submit3" >Cancel</button>

                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
    <div class="recordedUniversity">
        <div class="container">
        <h3 class="titleTable"> Qualification List</h3>
        <table class="recordQuaTable">
          <thead>
            <tr>
              <th>Subject Name</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if(($results->num_rows) > 0){
          while ($row = mysqli_fetch_array($results)){
              echo "<tr>";

              echo "<td>" . $row['subjectName'] . "</td>";
              echo "<td>" . $row['grade'] . "</td>";
              echo "</tr>";
          }}
          ?>
        </tbody>
      </table>
    </div>
    </div>
&nbsp;&nbsp;

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
