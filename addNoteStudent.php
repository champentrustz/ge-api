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
$note = $jsonArray['note'];


if($note == ''){
    $sql_update = "UPDATE course_check_student
SET note = null 
WHERE id = '".$check_id."'";
    $result = mysqli_query($conn, $sql_update);
}
else{
    $sql_update = "UPDATE course_check_student
SET note = '".$note."'
WHERE id = '".$check_id."'";
    $result = mysqli_query($conn, $sql_update);
}











