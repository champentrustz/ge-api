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



$course_question_id = $jsonArray['course_question_id'];





$sql_update = "UPDATE course_question
SET vote = vote+1
WHERE id = '".$course_question_id."'";
$result = mysqli_query($conn, $sql_update);









