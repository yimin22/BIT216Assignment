<!DOCTYPE html>
<html lang="en">
<head>
<title>Review Application</title>
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
  text-align: left;
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

</style>
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

<!-- Home -->

<div class="home">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li>Review Application</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Content-->
<body>
<h2>Review Application</h2>

  <div>
  <table>
    <thead>
      <tr>
        <th>Programme Code</th>
        <th>Programme Name</th>
        <th>Applied Applicants</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $programmes = $connect->query("SELECT programmeCode as code, programmeName AS name FROM programme WHERE universityID = (SELECT universityID FROM universityadmin WHERE userID LIKE (SELECT userID FROM users WHERE username LIKE '".$_SESSION['logged']."'))");

    foreach ($programmes as $programme){
      $applicants = $connect->query("SELECT U.fullname,A.applicationID
          FROM users AS U
              INNER JOIN application AS A ON A.applicantID = (SELECT applicantID FROM applicant WHERE userID = U.userID)
                WHERE A.status = 'Pending' AND A.programmeCode = '".$programme['code']."'");
    ?>
      <tr>
      <td><?php echo $programme['code'];?></td>
      <td><?php echo $programme['name'];?></td>
      <td><?php
        $applicantArray = array();
        foreach($applicants as $applicant){
          array_push($applicantArray, array($applicant['fullname'],$applicant['applicationID']));
        }
        if(sizeOf($applicantArray)<1){
          echo "No Application!";
        }else{
      foreach( $applicantArray AS $applicantDetail ) {  ?>
              <a href="applicantDetails.php?applicationID=<?php echo $applicantDetail[1];?>"><?php echo $applicantDetail[0];?></a><br><?php }unset($applicantArray); ?></td>
      </tr>
    <?php }} ?>
  </tbody>
</table>
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
