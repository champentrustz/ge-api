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
$student_id = $jsonArray['student_id'];
$student_first_name = $jsonArray['student_first_name'];
$student_last_name = $jsonArray['student_last_name'];
$course_start = $jsonArray['course_start'];
$course_end = $jsonArray['course_end'];

$timeCheckIn = $date->format('H:i:s');
$checkInDate = $date->format('Y-m-d H:i:s');




if(strtotime($timeCheckIn) <= strtotime('+30 minute',strtotime($course_start))){

    $status = 'NORMAL';
}
elseif(strtotime($timeCheckIn) > strtotime('+30 minute',strtotime($course_start)) && strtotime($timeCheckIn) <= strtotime('+1 hours',strtotime($course_start))){
    $status = 'LATE';
}
else{
    $status = 'ABSENT';
}



$sql_insert = "INSERT INTO course_check_student
VALUES (null , '".$course_id."', '".$group_id."', '".$student_id."', '".$student_first_name."', '".$student_last_name."', '".$status."', null, '".$checkInDate."', null, null);";
$result = mysqli_query($conn, $sql_insert);

$statusResponse = array('status' => $status);
echo json_encode($statusResponse);







