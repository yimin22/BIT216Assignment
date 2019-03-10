<!DOCTYPE html>
<html lang="en">
<head>
<title>Record University</title>
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
<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
<style>
.recordUniTable
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

  if(isset($_POST['universityName'])){
    /* get values from jom uni admin */
    $universityName = $_POST['universityName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    /*retrieve value and save into mysql
    1. $univalues - get universityName
    2. $sql1 - save into university class ->get auto ID
    3. $uservalues - create for user -->university admin
    4. $sql2 - save into user class/mysql_list_tables
    5. $query - check the university name whether is same
    */
  	$univalues = warpQuote($universityName);
    $sql1 = "INSERT INTO university(universityName) VALUES (" .$univalues.");";

    $uservalues = warpQuote($username).",".warpQuote($password).",".warpQuote($email);
    $sql2 = "INSERT INTO users(username, password, email) VALUES (".$uservalues.");";
    $query = $connect->query("SELECT universityName FROM university WHERE universityName = '".$universityName."';")->num_rows;

  	if($query){
      $error = "$universityName has been recorded!";
      echo "<script type='text/javascript'>alert('$error');</script>";
      unset($universityName);
    }
    else{
      /*
      1. selectUniID - get university name from university table
      2. selectUserID - get username from users table
      3. uniAdminValues - collect universityID and selectUserID
      4. sql3 - create new university admin --> connect to sql
      */
      $connect->query($sql1);
      $connect->query($sql2);
      $selectUniID = mysqli_fetch_assoc($connect->query("SELECT universityID FROM university WHERE universityName = '".$universityName."';"));
      $selectUserID = mysqli_fetch_assoc($connect->query("SELECT userID FROM users WHERE username = '".$username."';"));
      $uniAdminValues = $selectUniID['universityID'].",".$selectUserID['userID'];
      $sql3 = "INSERT INTO universityadmin (universityID, userID) VALUES(".$uniAdminValues.");";
      $connect->query($sql3);
      header("Location: index.php");
  		exit();
    }
  }
/* to check the list of university register in the system*/
$universities = $connect->query("SELECT * FROM university");
?>

<div class="main">
  <section class="signup">
    <!-- <img src="images/signup-bg.jpg" alt=""> -->
    <div class="container">
      <div class="signup-content">
        <form method="post" id="addUni-form" name="recordUniversity" class="recordUniversiy-form">
          <h2 class="form-title">Record University</h2>
          <div class="form-group">
            <input type="text" class="form-input" name="universityName" id="universityName" placeholder="University Name" required<?php echo isset($universityName)?"value=".warpQuote($universityName):"";?>>
          </div>
          <div class="form-group">
            <input type="text" class="form-input" name="username" id="username" placeholder="Username" required<?php echo isset($username)?"value=".warpQuote($username):"";?>>
          </div>
          <div class="form-group">
            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required<?php echo isset($password)?"value=".warpQuote($password):"";?>>
            <span toggle="#password" class="zmdi zmdi-eye-off field-icon toggle-password"></span>
          </div>
          <div class="form-group">
            <input type="text" class="form-input" name="email" id="email" placeholder="E-mail" required<?php echo isset($email)?"value=".warpQuote($email):"";?>>
          </div>
          <div class="form-group">
            <button type="submit" class="form-submit submit2 " value="<?php echo $UNIVERSITY ?>">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<!-- university table list -->
<div class="recordedUniversity">
    <div class="container">
    <h3 class="titleTable"> Universities List in the Sytem </h3>
    <table class="recordUniTable">
      <thead>
        <tr>
          <th>University ID</th>
          <th>University Name</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(($universities->num_rows) > 0){
      while ($row = mysqli_fetch_array($universities)){
          echo "<tr>";
          echo "<td>" . $row['universityID'] . "</td>";
          echo "<td>" . $row['universityName'] . "</td>";
          echo "</tr>";
      }}
      ?>
    </tbody>
  </table>
</div>
</div>
&nbsp;



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
</body>
</html>
