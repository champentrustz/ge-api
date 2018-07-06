<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-alloworigin,
access-control-allow-methods, access-control-allow-headers, multipart/form-data');
setlocale(LC_ALL,'C.UTF-8');

$content = file_get_contents("php://input");

$jsonArray = json_decode($content,true);

$course_id = $jsonArray['course_id'];
$group_id = $jsonArray['group_id'];


$files = glob("C:/MAMP/htdocs/upload-file/".$course_id."-".$group_id."/*");

$arrayFile = array();

foreach ($files as $filename) {

    $file = array('name' => ''.basename($filename));
    $arrayFile[] = $file;
}

echo json_encode($arrayFile);
