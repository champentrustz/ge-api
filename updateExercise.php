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



$exercise_id = $jsonArray['exercise_id'];
$name = $jsonArray['name'];
$score = $jsonArray['score'];




$sql_update = "UPDATE exercise
SET name = '".$name."', total_score = '".$score."'
WHERE id = '".$exercise_id."'";
$result = mysqli_query($conn, $sql_update);









