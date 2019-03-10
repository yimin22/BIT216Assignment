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
<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
<style>
.tablelist
{
	font-family: 'Questrial',cursive;
  border-collapse: collapse;
	width: 85%;
	height: 300px;
	margin: auto;
  box-shadow: 0px 11px 35px 2px rgba(0.1, 0, 0, 0.2);


}

th{

	text-align: left;
  padding: 10px;
	padding-left: 30px;
	padding-right: 320px;
  color: black;
  font-weight: bolder;
  font-family: 'Questrial',cursive;
	color: DodgerBlue;
  background-color: WhiteSmoke;
  font-size: 30px;
  border-left: 10px solid white;



}
.titleTable{
  text-align: center;
  margin-top: 25px;
	padding-top: 20px;
  margin-bottom: 20px;
}
td{
  background-color: white;
  font-size: 25px;
  padding-left: 30px;
	border-left: 5px solid;
	border-left-color: white;
  border-bottom: 5px solid PapayaWhip;


}
</style>
</head>
<body>

<div class="super_container">

<?php
include("server.php");
include("defaultValues.php");
if(isset($_SESSION['logged'])){
	include("headerLogin.php");
} else{
	 include("header.php");
  }
$universities = $connect->query("SELECT universityName FROM university");
$uniEmail = mysqli_fetch_assoc($connect->query("SELECT email FROM users WHERE userID = '".$userID."';"));

?>

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
								<li><a href="index.html">Home</a></li>
								<li>University</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tablelist">
		<table class="mysUni">
			<h3 class="titleTable">List of Malaysia Universities</h3>
			<thead>
				<tr class="top_content">
					<th>University Name</th>
					<th>Contact info </th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(($universities->num_rows) > 0){
					while ($row = mysqli_fetch_array($universities)){
						echo "<tr>";
						echo "<td>" . $row['universityName'] . "</td>";
						/*echo "<td>" . $row['email']. "</td>";*/
						echo "</tr>";
					}}
					?>
				</tbody>
			</table>
		</div>
&nbsp;&nbsp;



<?php include("footer.php")?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/courses.js"></script>
</body>
</html>
