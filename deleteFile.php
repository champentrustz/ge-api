<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-alloworigin,
access-control-allow-methods, access-control-allow-headers, multipart/form-data');
setlocale(LC_ALL,'C.UTF-8');

$content = file_get_contents("php://input");

$jsonArray = json_decode($content,true);

$course_id = $jsonArray['course_id'];
$group_id = $jsonArray['group_id'];
$file_name_doc = $jsonArray['file_name_doc'];

$file_name = "C:/MAMP/htdocs/upload-file/".$course_id."-".$group_id."/".$file_name_doc;

if(unlink($file_name)){
    $status = array("status" => "ลบไฟล์สำเร็จ!",
        "type" => "success");
    echo json_encode($status);
}
else{
    $status = array("status" => "ลบไฟล์ไม่สำเร็จ! กรุณาลองใหม่อีกครั้ง",
        "type" => "wrong");
    echo json_encode($status);
}



