<!-- Header -->
<style>
.dropbtn {
  background-color:#ffffff00;
  padding: 16px;
  font-family: 'Roboto Slab', serif;
  font-size: 18px;
	font-weight: bold;
	color: #002DA7;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  font-size: 16px;
	font-weight: 500;
	color: #384158;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #14bdee;}
</style>

<header class="header">

  <!-- Top Bar -->
  <div class="top_bar">
    <div class="top_bar_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
              <ul class="top_bar_contact_list">
                <li><div class="question">Have any questions?</div></li>
                <li>
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <div>012-3456789</div>
                </li>
                <li>
                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <div>info.jomuni@gmail.com</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Content -->
  <div class="header_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo_container">
              <a href="index.php">
                <div class="logo_text">JOM<span>UNI</span></div>
              </a>
            </div>
            <nav class="main_nav_contaner ml-auto">
              <ul class="main_nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="university.php">University</a></li>
                <li><a href="entryRequirement.php">Entry Requirements</a></li>
                <div class="dropdown">
                  <button class="dropbtn"><?php echo $_SESSION['logged'] ?></button>
                  <div class="dropdown-content">
                    <?php
                    if($_SESSION['type'] == $APPLICANT){
                      echo"<ul>
                        <li><a href=\"applyProgramme.php\">Apply Programme</a></li>
                        <li><a href=\"applicantQualification.php\">My Qualification</a></li>
                        <li><a href=\"logout.php\"><font color=\"FF0000\">Logout</font></a></li>
                    </ul>";
                  } elseif($_SESSION['type'] == $UNIVERSITY_ADMIN){
                      echo "<ul>
                        <li><a href=\"recoreProgramme.php\">Record Programme</a></li>
                        <li><a href=\"reviewApplicant.php\">Review Application</a></li>
                        <li><a href=\"logout.php\"><font color=\"FF0000\">Logout</font></a></li>
                    </ul>";
                  } elseif($_SESSION['type'] == $SYSTEM_ADMIN){
                    echo "<ul>
                      <li><a href=\"setUpQualification.php\">Set Up Qualification</a></li>
                      <li><a href=\"recordUniversity.php\">Record University</a></li>
                      <li><a href=\"logout.php\"><font color=\"FF0000\">Logout</font></a></li>
                  </ul>";
                  }echo "<script>console.log('".$_SESSION['type']."')</script>";
                  ?>
                  </div>
                </div>
              </ul>
              <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Search Panel -->
  <div class="header_search_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
            <form action="#" class="header_search_form">
              <input type="search" class="search_input" placeholder="Search" required="required">
              <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
