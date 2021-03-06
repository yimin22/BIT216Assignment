<!DOCTYPE html>
<html lang="en">
<head>
<title>University</title>
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
include("server.php");
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
              <li>University</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Content-->
<body>
<h2>University</h2>
  <div>
  <form method="post" action="programmeDetails.php">
  <table>
    <thead>
      <tr>
        <th>University</th>
        <th>Programmes</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $Universities = $connect->query("SELECT universityID AS ID, universityName AS Name FROM university");
    foreach ($Universities as $university){
      $programmes = $connect->query("SELECT programmeName AS Name, programmeCode AS Code FROM programme WHERE universityID = ".$university['ID'].";");
      ?>

      <tr><td><?php echo $university['Name'];?></td>
      <td><?php
      $programmeArray = array();
      foreach($programmes as $programme){
        array_push($programmeArray, array($programme['Name'],$programme['Code']));
      }
      if(sizeOf($programmeArray)<1){
        echo "No Programme Offered!";
      }else{
    foreach( $programmeArray AS $programmeDetail ) {  ?>
            <a href="programmeDetails.php?programmeCode=<?php echo $programmeDetail[1];?>"><?php echo $programmeDetail[0];?></a><br><?php }unset($programmeArray); ?>
      </td></tr>
      <?php }} ?>
  </tbody>
</table>
</form>
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
