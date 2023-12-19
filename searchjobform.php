<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Angad Singh Bajwa" />
    <title>Assignment 1</title>
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

<h1 class = "heading1">Job Vacancy Posting System</h1></br>

<form class = "styled-form" action="searchjobprocess.php" method="GET">
        <!-- search job title -->
        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title"></br>
        <!-- extra criteria or filter -->
        <h3>Advance Search:</h3>

        <!-- search by position -->
        <div class = "radio">
        <label for="position">Position:</label>&nbsp&nbsp&nbsp
        <input type="radio" id="full_time" name="position" value="Full Time" >   <!-- Example for radio buttons -->
        <label for="full_time">Full Time</label>&nbsp&nbsp&nbsp
        <input type="radio" id="part_time" name="position" value="Part Time" >
        <label for="part_time">Part Time</label></br></br>        
        
        <!-- search by contract -->
        <label for="contract">Contract:</label>&nbsp&nbsp
        <input type="radio" id="ongoing" name="contract" value="On-going" >     <!-- Example for radio buttons -->
        <label for="ongoing">On-going</label>&nbsp&nbsp&nbsp
        <input type="radio" id="fixed_term" name="contract" value="Fixed term" >
        <label for="fixed_term">Fixed term</label></br></br>
        
        <!-- search by accept application  -->
        <label>Application by:</label>&nbsp&nbsp
        <input type="checkbox" id="accept_post" name="accept_app[]" value="Post">  <!-- Example for checkboxes -->
        <label for="accept_post">Post</label>
        <input type="checkbox" id="accept_email" name="accept_app[]" value="Mail">
        <label for="accept_email">Mail</label>
        </div>
        </br>
        <!-- search by location -->
        <label for="location">Location:</label>
        <select id="location" name="location">
            <option value="" selected>---</option>
            <option value="ACT">ACT</option>
            <option value="NSW">NSW</option>
            <option value="NT">NT</option>
            <option value="QLD">QLD</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="VIC">VIC</option>
            <option value="WA">WA</option>
        </select>
        </br>

        <div class="postbutton">
        <button type="submit" class = "button2">Search</button>
        <button type="reset" class = "button2" >Reset</button>
        </div>
        </br>
      <a href="index.php" class = "button1">Return to Home Page</a>
</form>


<footer class="footer-distributed">
	<div class="footer-right">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
  </div>

	<div class="footer-left">
    <h3>Angad Bajwa - 103166497 - Swinburne University</h3>
		<p>Advance Web Development &copy; 2023</p>
	</div>
</footer>

<script> //this is JS code for the navigation bar 
function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}
</script>

</body>
</html>