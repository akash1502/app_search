<?php

// suppress mysql being deprecated warning that pops up in all scripts
error_reporting(E_ALL & ~E_DEPRECATED);

$username = "root";
$password = "";
$hostname = "localhost";

/*//connection to the database
$dbhandle = new mysqli($hostname, $username, $password)
  or die("Unable to connect to MySQL");

if (isset($_GET['sandbox'])) {
  $selected = mysqli_select_db("goodmove_demo_project",$dbhandle) or die("Could not select examples");
} else {
  $selected = mysqli_select_db("goodmove_demo_project",$dbhandle) or die("Could not select examples");
}*/

$conn = mysqli_connect($hostname, $username, $password,"goodmove_demo_project");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}