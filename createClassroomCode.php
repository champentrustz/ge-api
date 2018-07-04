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



$course_id = $jsonArray['course_id'];
$group_id = $jsonArray['group_id'];
$type = $jsonArray['course_name'];
$code = $jsonArray['group_name'];

if($type == 'checkin-code'){
    $sql_update = "UPDATE course
SET checkin_code = '".$code."'
WHERE course_id = '".$course_id."' and group_id = '".$group_id."'";
    $result = mysqli_query($conn, $sql_update);
}
elseif($type == 'checkout-code'){
    $sql_update = "UPDATE course
SET checkout_code = '".$code."'
WHERE course_id = '".$course_id."' and group_id = '".$group_id."'";
    $result = mysqli_query($conn, $sql_update);
}











