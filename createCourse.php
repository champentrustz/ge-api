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
$course_name = $jsonArray['course_name'];
$group_name = $jsonArray['group_name'];




$sql_insert = "INSERT INTO course
VALUES (null , '".$course_id."', '".$group_id."', '".$course_name."', '".$group_name."',null ,null ,null);";
$result = mysqli_query($conn, $sql_insert);









