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


$content = file_get_contents("php://input");

$jsonArray = json_decode($content,true);



$course_id = $jsonArray['course_id'];
$group_id = $jsonArray['group_id'];
$student_id = $jsonArray['student_id'];
$course_start = $jsonArray['course_start'];
$course_end = $jsonArray['course_end'];


$date_day = date("Y-m-d");
$date_time = date('H:i:s');


$arrayFetch = array();
$question_sql="SELECT * FROM course_question WHERE course_id = '".$course_id."' and group_id = '".$group_id."' and student_id != '".$student_id."' and date_time LIKE  '%{$date_day}%' order by vote desc";
$query_question=mysqli_query($conn,$question_sql);

while($fetch_question=mysqli_fetch_assoc($query_question)){

    $questionDate = substr($fetch_question['date_time'],11,9);


    if(strtotime($questionDate) >= strtotime($course_start) && strtotime($questionDate) <= strtotime($course_end)) {

        $arrayFetch[] = $fetch_question;

    }

}


echo json_encode($arrayFetch);







