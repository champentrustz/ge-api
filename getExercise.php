<?php

date_default_timezone_set("Asia/Bangkok");

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-alloworigin,
access-control-allow-methods, access-control-allow-headers');

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


$content = file_get_contents("php://input");

$jsonArray = json_decode($content,true);



$exercise_id = $jsonArray['exercise_id'];


$date_day = date("Y-m-d");
$date_time = date('H:i:s');


$arrayFetch = array();
$exercise_sql="SELECT * FROM exercise WHERE id = '".$exercise_id."'";
$query_exercise=mysqli_query($conn,$exercise_sql);

$fetch_exercise=mysqli_fetch_assoc($query_exercise);


$arrayFetch[] = $fetch_exercise;



echo json_encode($arrayFetch);







