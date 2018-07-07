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



$course_id = $jsonArray['course_id'];
$group_id = $jsonArray['group_id'];


$date_day = date("Y-m-d");
$date_time = date('H:i:s');


$arrayFetch = array();
$exercise_sql="SELECT * FROM exercise WHERE course_id = '".$course_id."' and group_id = '".$group_id."' and deleted_at is null";
$query_exercise=mysqli_query($conn,$exercise_sql);

while($fetch_exercise=mysqli_fetch_assoc($query_exercise)){


    $exercise_question_sql="SELECT * FROM exercise_question WHERE exercise_id = '".$fetch_exercise['id']."'";
    $query_exercise_question=mysqli_query($conn,$exercise_question_sql);
    $count = mysqli_num_rows($query_exercise_question);
    if($count>0){
        $status = array('status' => 'have-question');
        $arrayFetch[] = $fetch_exercise+$status;
    }
    else{
        $status = array('status' => 'no-question');
        $arrayFetch[] = $fetch_exercise+$status;
    }


}


echo json_encode($arrayFetch);







