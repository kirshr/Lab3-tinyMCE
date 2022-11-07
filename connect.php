<?php 
$conn = new mysqli("localhost", "kshrestha1", "IAf1ENg22HNRl4j", "kshrestha1_lab3");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if (!defined("BASE_URL")) {
	define("BASE_URL", "http://localhost/lab3/");
}
?>