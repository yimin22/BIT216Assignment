<!DOCTYPE html>
<html lang="en">
<head>
<title>Entry Requirements</title>
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
  margin-bottom: 30px;
  margin-top: 30px;
  margin-left:15%;
  margin-right: 15%;
  padding: 0;
}

th, td {
  text-align: left;
  padding: 15px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #14bdee;
  color: white;
}
</style>
</head>

<body>

<div class="super_container">

<?php
include("server.php");
$page_title = $UNIVERSITY;
include("header.php")?>

<!-- Menu -->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
  <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
  <div class="search">
    <form action="#" class="header_search_form menu_mm">
      <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
      <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
      </button>
    </form>
  </div>
  <nav class="menu_nav">
    <ul class="menu_mm">
      <li class="menu_mm"><a href="index.php">Home</a></li>
      <li class="menu_mm"><a href="#">About</a></li>
      <li class="menu_mm"><a href="#">University</a></li>
      <li class="menu_mm"><a href="#">Sign Up</a></li>
      <li class="menu_mm"><a href="#">Login</a></li>
    </ul>
  </nav>
</div>

<!-- Home -->

<div class="home">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li>Entry Requirements</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</head>

<!--Content-->

<body>
<h2>Entry Requirements</h2>
<table>
  <tr>
    <th>Qualification Name</th>
    <th>Caluculation of Overall Result</th>
    <th>Grading System</th>
  </tr>
  <tr>
    <td></td>
    <td>Griffin</td>
    <td>$100</td>
  </tr>

</table>


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
