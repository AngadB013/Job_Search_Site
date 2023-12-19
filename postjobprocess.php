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

<?php

// Function to check if a string is empty
function is_empty($string)
{
    $string = trim($string);
    return empty($string);
}

// Function to validate Position ID
function validate_position_id($position_id)
{
    if (is_empty($position_id))
        return "Position ID cannot be empty";
    if (strlen($position_id) !== 7)
        return "Position ID must be 7 characters in length";
    if (!preg_match("/^PID\d{4}$/", $position_id))
        return "Position ID must start with \"PID\" followed by 4 digits";
    return "";
}

// Function to validate Title
function validate_title($title)
{
    if (is_empty($title))
        return "Title cannot be empty";
    if (strlen($title) > 20)
        return "Title must be 20 characters or less in length";
    if (!preg_match("/^[A-Za-z ,.!]{1,25}$/", $title))
        return "Title can only contain alphanumeric characters, spaces, comma, or period";
    return "";
}

// Function to validate Description
function validate_description($description)
{
    if (is_empty($description))
        return "Description cannot be empty";
    if (strlen($description) > 250)
        return "Description must be 250 characters or less in length";
    return "";
}
        
// Function to validate Closing Date
function validate_closing_date($closing_date)
{
    if (is_empty($closing_date))
        return "Closing Date cannot be empty";
    if (!preg_match("/^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[0-2])\/\d{2}$/", $closing_date))
        return "Date must follow dd/mm/yy format";
    $date_parts = explode("/", $closing_date);
    if (!checkdate($date_parts[1], $date_parts[0], "20" . $date_parts[2])) {
        return "Date is not valid";
    }
    return "";
}

// Function to validate Position
function validate_position($position)
{
    if (is_empty($position))
        return "Position option must be selected";
    return "";
}
        
// Function to validate Contract
function validate_contract($contract)
{
    if (is_empty($contract))
        return "Contract option must be selected";
    return "";
}

// Function to validate Accept Application
function validate_accept_application($accept_application)
{
    if (is_empty($accept_application))
        return "At least one application method must be selected";
    return "";
}

// Function to validate Location
function validate_location($location)
{
    if ($location == "---") {
        return "Please select your location";
    }
    return "";
}
     
// Function to validate the entire form
function validate_form(&$position_id, &$title, &$description, &$closing_date, &$position, &$contract, &$accept_application, &$location)
{
    $errors = array(
        validate_position_id($position_id),
        validate_title($title),
        validate_description($description),
        validate_closing_date($closing_date),
        validate_position($position),
        validate_contract($contract),
        validate_accept_application($accept_application),
        validate_location($location)
    );
    
    $error_count = 0;
    foreach ($errors as $error) {
        if (!is_empty($error)) {
            echo "<p>" . $error . "</p>";
            $error_count++;
        }
    }
    return $error_count;
}
     
$position_id = $_POST["position_id"];
$title = $_POST["title"];
$description = $_POST["description"];
$closing_date = $_POST["closing_date"];
$position = isset($_POST["position"]) ? $_POST["position"] : "";
$contract = isset($_POST["contract"]) ? $_POST["contract"] : "";
$accept_application = isset($_POST["accept_application"]) ? $_POST["accept_application"] : "";
$location = isset($_POST["location"]) ? $_POST["location"] : "";

$error_count = validate_form($position_id, $title, $description, $closing_date, $position, $contract, $accept_application, $location);
   
if ($error_count !== 0) {
    echo "<p>Return to Post Job Vacancy page - <a href='postjobform.php' class='button1'>Post Job</a></p>";
    echo "<p>Return to Home page - <a href='index.php' class='button1'>Home</a></p>";
    return;
}

$directory = "../../data/jobposts";

if (!file_exists($directory)) {
    umask(0007);
    mkdir($directory, 02770);
}

$filename = "../../data/jobposts/jobs.txt";
$joblist = array();       
   
if (!file_exists($filename)) {
    $new_data = true;
} else {
    $handle = fopen($filename, "r");
    while (!feof($handle)) {
        $data = fgets($handle);
        $data = explode("\t", $data);
        $joblist[] = $data;
    }    
    foreach ($joblist as $job) {
        if (in_array($position_id, $job)) {
            $new_data = false;
            break;
        }
        $new_data = true;
    }
    fclose($handle);
}        
          
if ($new_data) {
    $data = $position_id . "\t" . $title . "\t" . $description . "\t" .
        $closing_date . "\t" . $position . "\t" . $contract . "\t" .
        "\t" . $accept_application . "\t" . $location . "\n";
    $joblist[] = $data;
    file_put_contents($filename, $data, FILE_APPEND);
    echo "<p>Job successfully posted</p>";
    echo "<p>Return to Post Job Vacancy page - <a href='postjobform.php' class='button1'>Post Job</a></p>";
    echo "<p>Return to Home page - <a href='index.php' class='button1'>Home</a></p>";
} else {
    echo "<p>Job with the same ID already exists</p>";
    echo "<p>Return to Post Job Vacancy page - <a href='postjobform.php' class='button1'>Post Job</a></p>";
    echo "<p>Return to Home page - <a href='index.php' class='button1'>Home</a></p>";
}
        
?>


</body>
</html>
