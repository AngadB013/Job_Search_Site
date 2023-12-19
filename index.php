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

<!-- Header Section -->
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

<!-- Main Content Section -->
<h1 class = "heading1">Job Vacancy Posting System</h1>
  <div id = "info">
    <p>Name: Angad Singh Bajwa</p>
    <p>Email: <a href="mailto:'angsbajwa@gmail.com">angsbajwa@gmail.com</a></p>
    <p></br>
      “I declare that this is my individual work. I have not worked
      collaboratively, nor have I copied any others work or from any other source.”</a>
    </p>
  </div>
    </br>
  <div id = "buttons">
    <a href="postjobform.php" class = "button1">Post Job Vacancy </a>
    <a href="searchjobform.php" class = "button1"> Search for a Job </a>
    <a href="about.php" class = "button1"> About </a>
  </div>

<!-- Footer Section -->
<footer class="footer-distributed">
	<div class="footer-right">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
  </div>

	<div class="footer-left">
    <h3>Angad Bajwa - Bachelor's In ICT</h3>
		<p>&copy; 2023</p>
	</div>
</footer>

<script> //this is JS code for the navigation bar 
function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}
</script>

</body>
</html>
