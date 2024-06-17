<header>
  <div class="header-main-container">
    <div class="header-upper-container">
      <img src="./images/EDUCOACH.JPG" alt="">
    </div>

    <div>
      <div class="topnav">
        <a class="active" href="./">Home</a>
        <a href="./course.php">Courses</a>
        <a href="./faq.php">FAQ</a>
        <a href="./contactus.php">Contact Us</a>
        <div class="dropdown">
          <a class="dropbtn">Admin</a> 
          <div class="dropdown-content">
            <a href="./faqmanage.php">FAQ Management</a>
            <a href="./managecourse.php">Course Management</a>
            <a href="./contactmanage.php">Contact Management</a>
          </div>
        </div>
        <div class="last-a-box">
          <?php 
            // checking if a user is logged in
            if (!isset($_SESSION['user_id'])) {
              echo '<a href="./join.php">Sign In / Sign Up</a>';
            } else {
              echo '<a>Hi ' , $_SESSION['name'] , '!</a>';
              echo '<a href="./myaccount.php">My Account</a>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</header>
