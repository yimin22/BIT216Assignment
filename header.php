<!-- Header -->

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
              <a href="#">
                <div class="logo_text">JOM<span>UNI</span></div>
              </a>
            </div>
            <nav class="main_nav_contaner ml-auto">
              <ul class="main_nav">
                <li <?php if ($page_title == $HOME){ ?>class="active"<?php } ?>>
              <a href="index.php">Home</a></li>
                <li <?php if ($page_title == $ABOUT){ ?>class="active"<?php } ?>>
              <a href="about.php">About</a></li>
                <li <?php if ($page_title == $UNIVERSITY){ ?>class="active"<?php } ?>>
              <a href="university.php">University</a></li>
                <li <?php if ($page_title == $SIGNUP){ ?>class="active"<?php } ?>>
              <a href="signup.php">Sign Up</a></li>
                <li <?php if ($page_title == $LOGIN){ ?>class="active"<?php } ?>>
              <a href="login.php">Login</a></li>
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
