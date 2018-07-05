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



$question_id = $jsonArray['question_id'];
$answer = $jsonArray['answer'];


if($answer == ''){
    $sql_update = "UPDATE course_question
SET answer = null 
WHERE id = '".$question_id."'";
    $result = mysqli_query($conn, $sql_update);
}
else{
    $sql_update = "UPDATE course_question
SET answer = '".$answer."' 
WHERE id = '".$question_id."'";
    $result = mysqli_query($conn, $sql_update);
}












