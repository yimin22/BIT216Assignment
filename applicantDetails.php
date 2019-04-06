<?php if(!isset($_GET['applicationID'])){header("Location: index.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Application</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/courses.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<style>

h2{
  	font-family: 'Roboto Slab', serif;
  	font-weight: 700;
  	-webkit-font-smoothing: antialiased;
  	-webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
  	text-shadow: rgba(0,0,0,.01) 0 0 1px;
  	color: #384158;
    text-transform: uppercase;
    text-align: center;
    line-height: 1.66;
    margin: 0;
    padding: 0;
    margin-bottom: 20px;
    margin-top: 20px;
}

table {
  border-collapse: collapse;
  width: 70%;
  margin-bottom: 50px;
  margin-top: 30px;
  margin-left:15%;
  margin-right: 15%;
  padding: 0;
}

th, td {
  text-align: justify;
  padding: 15px;
  color: black;
  font-family: "Comic Sans MS", cursive, sans-serif;
  background-color: #dbf6ff;
  font-size: 16px;
  border: 2px solid #ccc;
  border-color: white;
}

th {
  background-color: #14bdee;
  color: white;
  font-family: Georgia, serif;
  font-weight: bold;
  font-size: 16px;
}

.button {
  display:inline-block;
  cursor: pointer;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  padding:20px 20px;
  box-sizing: border-box;
  font-size: 16px;
  font-weight: bold;
	margin-bottom: 30px;
	margin-left: 38%;
	width:25%;
  text-transform: uppercase;
  border: none;
  background-image: -moz-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -ms-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -o-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -webkit-linear-gradient(to left, #74ebd5, #9face6);
  background-image: linear-gradient(to left, #74ebd5, #9face6); }
}
}

</style>

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
    include("header.php");}
    if(isset($_POST['action'])){
      $some = $connect->query("UPDATE `application` SET `status`=".warpQuote($_POST['action'])." WHERE applicationID =".$_GET['applicationID']);
      ?><script>
      alert("Application <?php echo $_POST['action']?>");
      location.href = "index.php";
      </script>
      <?php
    }
  $application = mysqli_fetch_assoc($connect->query("SELECT status,applicationDate,applicantID,programmeCode FROM application
    WHERE applicationID = ".$_GET['applicationID']));
    if(!empty($application['applicantID'])){
      $visibleProgramme = $connect->query("SELECT programmeCode FROM programme WHERE universityID =
        (SELECT universityID FROM universityAdmin WHERE userID =
          (SELECT userID FROM users WHERE username = ".warpQuote($_SESSION['logged'])."))");
          $visibleArray = array();
          foreach($visibleProgramme AS $p){
            array_push($visibleArray,$p['programmeCode']);
          }
          $bool = in_array($application['programmeCode'],$visibleArray);
          if($bool){
            $applicant =  mysqli_fetch_assoc($connect->query("SELECT fullname FROM users WHERE userID = (SELECT userID FROM applicant WHERE applicantID = ".$application['applicantID'].") "));
?>

<!-- Home -->

<div class="home">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="reviewApplication.php">Review Application</a></li>
							<li>Application</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Content-->
<body>
<h2>Application</h2>

  <div>
  <table>
    <thead>
      <tr>
        <th>Name of Applicant</th>
        <td><?php echo $applicant['fullname']; ?></td>
      </tr>
      </thead>
      <tbody>
        <tr>
          <th>Qualification</th>
          <td><?php
          $Qualification = $connect->query("SELECT R.subjectName,
            CASE WHEN R.score = 0 THEN R.grade ELSE R.score END AS result,R.qualificationID
            FROM results AS R
            WHERE R.applicant =".$application['applicantID']);

            if(mysqli_num_rows($Qualification)<1){
              echo "No Qualification Obtained!";
            }else{
            $ResultArray = array();
            foreach($Qualification AS $Result){
              $qid = $Result['qualificationID'];
              array_push($ResultArray,$Result['subjectName']." - ".$Result['result']);}

            $QualificationName = mysqli_fetch_assoc($connect->query("SELECT qualificationName FROM qualification WHERE qualificationID =".$qid));
            echo $QualificationName['qualificationName']."<br><br>";
            echo join("<br>",$ResultArray);}?></td>
        </tr>
        <tr>
          <th>Submission Date</th>
          <td><?php echo $application['applicationDate'];?></td>
        </tr>
        <tr>
          <th>Status</th>
          <td><?php echo $application['status'];?></td>
        </tr>
  	  </tbody>
      <?php
    }else{ ?>
      <script>
      alert("You have no rights to view this application");
      location.href = "index.php";
      </script>
      <?php }
  }else{?>
  <script>
  alert("No application found");
  location.href = "index.php";
  </script>
<?php }  ?>
	</table>
	</div>

	<form method="POST">
      <button type="submit" name="action" value="Offered" class="button" style="color: #00008B;margin-left: 19%;">Approve</button>
      <button type="submit" name="action" value="Declined" class="button" style="color: red;margin-left: 11%;">Reject</button>
		</form>




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
