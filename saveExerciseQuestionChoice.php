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



$exercise_question_id = $jsonArray['exercise_question_id'];
$choiceA = $jsonArray['choiceA'];
$choiceB = $jsonArray['choiceB'];
$choiceC = $jsonArray['choiceC'];
$choiceD = $jsonArray['choiceD'];
$statusA = $jsonArray['statusA'];
$statusB = $jsonArray['statusB'];
$statusC = $jsonArray['statusC'];
$statusD = $jsonArray['statusD'];

$sql_insert_A = "INSERT INTO exercise_question_choice
VALUES (null , '".$exercise_question_id."', '".$choiceA."', '".$statusA."');";
$resultA = mysqli_query($conn, $sql_insert_A);

$sql_insert_B = "INSERT INTO exercise_question_choice
VALUES (null , '".$exercise_question_id."', '".$choiceB."', '".$statusB."');";
$resultB = mysqli_query($conn, $sql_insert_B);

$sql_insert_C = "INSERT INTO exercise_question_choice
VALUES (null , '".$exercise_question_id."', '".$choiceC."', '".$statusC."');";
$resultC = mysqli_query($conn, $sql_insert_C);

$sql_insert_D = "INSERT INTO exercise_question_choice
VALUES (null , '".$exercise_question_id."', '".$choiceD."', '".$statusD."');";
$resultD = mysqli_query($conn, $sql_insert_D);












