<?php

date_default_timezone_set("Asia/Bangkok");

header("Access-Control-Allow-Origin: *");


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ge-ssru";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = new DateTime();



$content = file_get_contents("php://input");

$jsonArray = json_decode($content,true);



$check_id = $jsonArray['check_id'];
$status = $jsonArray['status'];



$sql_update = "UPDATE course_check_student
SET status = '".$status."'
WHERE id = '".$check_id."'";
$result = mysqli_query($conn, $sql_update);











