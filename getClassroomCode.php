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


$date_day = date("Y-m-d");
$date_time = date('H:i:s');



$sql_course = "SELECT * FROM course WHERE deleted_at is null and course_id = '".$course_id."' and group_id = '".$group_id."'";
$result_course = mysqli_query($conn, $sql_course);

while($row_course = mysqli_fetch_assoc($result_course)) {

    $course = $row_course;

}



echo json_encode($course);








