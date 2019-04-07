<?php if(!isset($_GET['programmeCode'])){header("Location: index.php");}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Programme</title>
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
  color: #fff;
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
if(isset($_SESSION['logged'])){
	include("headerLogin.php");
} else{
	 include("header.php");
  }

$programme = mysqli_fetch_assoc($connect->query("SELECT * FROM programme
    WHERE programmeCode = ".warpQuote($_GET['programmeCode'])));
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
              <li><a href="university.php">University</a></li>
							<li>Programme</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Content-->
<body>
<h2>Programme</h2>
  <div>
  <table>
    <thead>
      <tbody>
      <tr>
        <th>Programme Name</th>
        <td><?php echo $programme['programmeName'];?></td>
      </tr>
      <tr>
        <th>About the Programme</th>
        <td><?php echo $programme['description'];?></td>
      </tr>
      <tr>
        <th>Closing Date</th>
        <td><?php echo $programme['closingDate'];?></td>
      </tr>
      <tr>
        <th>Academic Qualification</th>
        <td><?php echo str_replace(',','<br/>',$programme['academicQualification'])  ;?></td>
      </tr>
      </tbody>
    </thead>
	</table>
	</div>

	<div>

    <form>
      <input type="button" class="button" value="Apply Now" onclick="window.location.href='applyProgramme.php'" />
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
