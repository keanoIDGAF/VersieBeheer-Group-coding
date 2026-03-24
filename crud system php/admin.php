<!-- ...................................................... -->
<!-- Name:                       Portfolio List             -->
<!-- Why its made:               This is made for database management -->
<!-- Why this file:              This code is the made to connect to databases and show the admin page -->
<!-- ...................................................... -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=,$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>