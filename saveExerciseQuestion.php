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

$date = new DateTime();



$content = file_get_contents("php://input");

$jsonArray = json_decode($content,true);



$exercise_id = $jsonArray['exercise_id'];
$question = $jsonArray['question'];
$score = $jsonArray['score'];

$sql_insert = "INSERT INTO exercise_question
VALUES (null , '".$exercise_id."', '".$question."', '".$score."');";
if($result = mysqli_query($conn, $sql_insert)){
    $last_question_id = $conn->insert_id;
    $dataReturn = array("question_id" => $last_question_id);
    echo json_encode($dataReturn);
}












