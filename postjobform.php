<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Angad Singh Bajwa" />
    <title>Jobsite</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header>
    <div id="brand"><a href="index.php">Job Portal</a></div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="postjobform.php">Post Job</a></li>
	      <li><a href="searchjobform.php">Search</a></li>
        </ul>
      </nav>

    <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
        <li><a href="index.php">Home</a></li>
	      <li><a href="about.php">About</a></li>
        <li><a href="postjobform.php">Post Job</a></li>
	      <li><a href="searchjobform.php">Search</a></li>
        </ul>
    </div>
</header>

<h1 class = "heading1">Job Vacancy Posting System</h1>
<form class="styled-form" action="postjobprocess.php" method="post">

    <label for="position_id">Position ID:</label><!--The ^ at the beginning and $ at the end indicate that the pattern should match the entire input string.-->
    <input type="text" id="position_id" name="position_id" pattern="^PID[0-9]{4}$"> 
    <br>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" pattern="[A-Za-z ,.!]{1,25}" >
    <br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" maxlength="250" ></textarea>
    <br>

    <label for="closing_date">Closing Date:</label>
    <input type="text" id="closing_date" name="closing_date" value="<?php echo date('d/m/y'); ?>" >
    <br>

    <div class = "radio">
      <label>Position:</label></br>  <!-- Radio buttons with associated labels -->
        <input type="radio" id="full_time" name="position" value="Full Time" >
      <label for="full_time">Full-Time</label>&nbsp&nbsp&nbsp
        <input type="radio" id="part_time" name="position" value="Part Time" >
      <label for="part_time">Part-Time</label>
      <br></br>

      <label>Contract:</label></br>  <!-- Radio buttons with associated labels -->
        <input type="radio" id="ongoing" name="contract" value="On-going" >
      <label for="ongoing">On-going</label>&nbsp&nbsp&nbsp
        <input type="radio" id="fixed_term" name="contract" value="Fixed term" >
      <label for="fixed_term">Fixed-term</label>
      <br></br>

      <label>Accept Application by:</label></br><!-- Checkboxes with associated labels -->
        <input type="checkbox" id="accept_post" name="accept_application" value="Post">
      <label for="accept_post">Post</label>&nbsp&nbsp&nbsp
        <input type="checkbox" id="accept_email" name="accept_application" value="Email">
      <label for="accept_email">Email</label>
      <br></br>
    </div>

    <label for="location">Location:</label>
    <select id="location" name="location">
      <!-- Location options -->
        <option value="---">---</option>
        <option value="ACT">ACT</option>
        <option value="NSW">NSW</option>
        <option value="NT">NT</option>
        <option value="QLD">QLD</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="VIC">VIC</option>
        <option value="WA">WA</option>
    </select>
    <br>

    <div class = "postbutton">
      <button type="submit" class = "button2">Submit</button>
      <button type="reset" class = "button2">Reset</button>
    </div>

   <br>
   <p>All fields are required. <a href="index.php" class = "button1">Return to Home Page</a></p>
</form>

<footer class="footer-distributed">
	<div class="footer-right">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
  </div>

	<div class="footer-left">
    <h3>Angad Bajwa - Bachelor's of ICT</h3>
		<p> &copy; 2023</p>
	</div>
</footer>

<script> //this is JS code for the navigation bar 
function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}
</script>

</body>
</html>
