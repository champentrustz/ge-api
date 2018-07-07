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



$course_id = $jsonArray['course_id'];
$group_id = $jsonArray['group_id'];
$name = $jsonArray['name'];
$amount = $jsonArray['amount'];


$sql_insert = "INSERT INTO exercise
VALUES (null , '".$course_id."', '".$group_id."', '".$name."', '".$amount."',null ,null);";


if($result = mysqli_query($conn, $sql_insert)){
    $status = array('status' => 'success');
    echo json_encode($status);
}












