<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Angad Singh Bajwa" />
    <title>Jobsite</title>
    <link rel="stylesheet" href="style.css"/>
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

<h1 class = "heading1">About</h1></br>

<section style="margin-left:100px">
    <p><strong>What is the PHP version installed in mercury?</strong></p>
    <p>My PHP version is: <strong><?php echo phpversion() ?></strong>.</p></br>
    <p><strong>Special features:</strong></br> CSS has been implemented. Navigation bar and a footer has also been developed.
    </br>The website is fully responsive and a small JavaScript code is also included so as to minimize the navaigation bar</p>    	
</section>
</br>
<section style="margin-left:100px">
  <p><strong>Screenshot: </strong></p>
</section>
<p style="text-align:center"><a href="index.php" class="button1">Return to homepage</a></p>

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
