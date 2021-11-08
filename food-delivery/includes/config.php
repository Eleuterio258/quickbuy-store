<?php
$servername = "localhost"; // Database Host
$username = "root"; // Database user
$password = ""; //  Database password
$dbname = "food-delivery"; //Table Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>