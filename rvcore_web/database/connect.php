<?php
//error_reporting(0);


$hostname = 'localhost';
$hostuser = 'root';
$hostpass = '';
$database = 'joomdev';

$conn = new mysqli($hostname, $hostuser, $hostpass, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>