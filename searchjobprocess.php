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

<h1 class = "heading1">Job Vacancy Information</h1></br>

<?php
        // Display the job position being searched for.
        echo "<h3 style=text-align:center>Job Position Searched: " .$_GET["job_title"]."</h3>";

        # Text file path
        $job_file = "../../data/jobposts/jobs.txt";
        if(isset($_GET["job_title"]) && !empty($_GET["job_title"])){

            // Extract and validate input parameters
            $job_title = $_GET["job_title"];
            # Get filters value
            $position_filter = isset($_GET["position"]) ? $_GET["position"] : "";
            $contract_filter = isset($_GET["contract"]) ? $_GET["contract"] : ""; 
            $application_by_filter = isset($_GET['accept_app']) ? $_GET['accept_app'] : []; 
            $location_filter = isset($_GET["location"]) ? $_GET["location"]  : "";

            $accept_post_filter = in_array('Post', $application_by_filter)? 'Post' : '';
            $accept_mail_filter = in_array('Mail', $application_by_filter)? 'Mail' : '';

            // Read job data from the file
            $job_lines = file($job_file,FILE_IGNORE_NEW_LINES);
            $job_matched = array();

            // Check for matching job vacancies
            foreach ($job_lines as $job_line){

                $test = explode("\t", $job_line);

                if (isset($test[3])) {
                    $closing_date = DateTime::createFromFormat("d/m/y", $test[3]);
                } else {
                    $closing_date = null; // or any other suitable default value
                }
            
                $current_date = new DateTime();

                // Get all checked criterias
                $position_checked = ($position_filter == '' || stripos($job_line, $position_filter) != false);
                $contract_checked  = ($contract_filter == '' || stripos($job_line, $contract_filter) != false);
                $application_post_checked  = ($accept_post_filter == '' || stripos($job_line, $accept_post_filter) != false);
                $application_mail_checked  = ($accept_mail_filter == '' || stripos($job_line, $accept_mail_filter) != false);
                $location_checked  = ($location_filter == '' || stripos($job_line, $location_filter) != false);

                // Check if the job matches all criteria
                if(stripos($job_line,$job_title) !=false &&
                    $position_checked && 
                    $contract_checked && 
                    $application_post_checked && 
                    $application_mail_checked && 
                    $location_checked){
                    // Check other filtering criteria
                    if($current_date <= $closing_date){
                        $job_matched[] = $job_line;
                    }
                }
            }

            // Sort job vacancies by closing date (using a bubble sort algorithm)
            $job_count = count($job_matched);
            for ($i = 0; $i < $job_count - 1; $i++) { // Compare and swap positions 
                for ($j = 0; $j < $job_count - $i - 1; $j++) {
                    $job1_closing_day = explode("\t", $job_matched[$j]);
                    $job2_closing_day = explode("\t", $job_matched[$j + 1]);
                    // Get the closing date
                    $closing_day1 = DateTime::createFromFormat("d/m/y", $job1_closing_day[3]); 
                    $closing_day2 = DateTime::createFromFormat("d/m/y", $job2_closing_day[3]);

                    if ($closing_day1 > $closing_day2) {
                        // Swap positions of 2 jobs if necessary
                        $temp = $job_matched[$j];
                        $job_matched[$j] = $job_matched[$j + 1];
                        $job_matched[$j + 1] = $temp;
                    }
                }
            }

            // Display matched job vacancies
            if(!empty($job_matched)){
                foreach ($job_matched as $job_match){
                     // Display matched job vacancies
                    $test = explode("\t", $job_match);
                    $job_pos = $test[1];
                    $description = $test[2];
                    $closing_date = $test[3];
                    $position = $test[4];
                    $contract = $test[5];
                    $accept_post = $test[6];
                    $accept_mail= $test[7];
                    $location = $test[8];

                    // Display job details in HTML
                   echo "<div class='styled-form'>";
                   echo "<span><strong>Job Title:</strong> $job_pos</span>";
                   echo "<span><strong>Description:</strong> $description</span>";
                   echo "<span><strong>Closing Date:</strong> $closing_date</span>";
                   echo "<span><strong>Position:</strong> ".$position." - ".$contract."</span>";
                   echo "<span><strong>Application by:</strong>";
                   // Display accepted application methods
                   if(!empty ($accept_post)){
                       if(!empty ($accept_mail)){
                           echo " $accept_post or $accept_mail";
                       } else{
                           echo " $accept_post";
                       }
                   } else{
                       echo " $accept_mail";
                   }
                   echo "</br><span><strong>Location:</strong> $location</span>"; 
                   echo "</div></br>";                    
               }
            }else{
                // Display a message if no matching job vacancies are found
                echo '<span style="color: #13a566"><p style = "text-align:center"><b>No job found for position searched: '.$job_title.'</b></p></span>';                
            }

        } else {
            // Display a message if the job title is not provided
            echo '<span style="color: #13a566"><p style = "text-align:center"><b>Please fill in the job title to search</b></p></span>';
        }
    ?>


<div class = "search_process_buttons"></br>	
  <p style="text-align:center"><a href="index.php" class="button1">Return to homepage</a></p>	
  <p style="text-align:center"><a href="searchjobform.php" class="button1">Search again</a></p>
</div>


<footer class="footer-distributed">
	<div class="footer-right">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
  </div>

	<div class="footer-left">
    <h3>Angad Bajwa - Bachelor's in ICT</h3>
		<p>&copy; 2023</p>
	</div>
</footer>

</body>
</html>
