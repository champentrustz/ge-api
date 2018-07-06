<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-alloworigin,
access-control-allow-methods, access-control-allow-headers, multipart/form-data');

setlocale(LC_ALL,'C.UTF-8');
$course_id = $_POST['course_id'];
$group_id = $_POST['group_id'];

$target_dir = "C:/MAMP/htdocs/upload-file/".$course_id."-".$group_id."/";
if(is_dir($target_dir) == TRUE) {

    $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
    $uploadOk = 1;

    if (file_exists($target_file)) {
        $uploadOk = 0;
        $status = array("status" => "ผิดพลาด! ไฟล์นี้ถูกอัพโหลดบนเซิร์ฟเวอร์อยู่แล้ว",
            "type" => "wrong");
        echo json_encode($status);
    }
    else if ($uploadOk == 0) {
        $status = array("status" => "ผิดพลาด! ไฟล์ไม่ถูกอัพโหลด",
            "type" => "wrong");
        echo json_encode($status);
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            chmod($target_file, 0777);
            $status = array("status" => "สำเร็จ! ไฟล์ " . basename($_FILES["file_upload"]["name"]) . " ถูกอัพโหลดเรียบร้อย",
                "type" => "success");
            echo json_encode($status);
            //header("Refresh:2; url=upload-file.php");

        } else {
            $status = array("status" => "ผิดพลาด! พบปัญหาในการอัพโหลดไฟล์",
                "type" => "wrong");
            echo json_encode($status);
            //header("Refresh:2; url=upload-file.php");
        }
    }
}


else {



    mkdir("C:/MAMP/htdocs/upload-file/".$course_id."-".$group_id, 0777);
    $target_file = $target_dir. basename($_FILES["file_upload"]["name"]);
    $uploadOk = 1;

    if (file_exists($target_file)) {
        $uploadOk = 0;
        $status = array("status" => "ผิดพลาด! ไฟล์นี้ถูกอัพโหลดบนเซิร์ฟเวอร์อยู่แล้ว",
        "type" => "wrong");
        echo json_encode($status);
    }

// Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $status = array("status" => "ผิดพลาด! ไฟล์ไม่ถูกอัพโหลด",
            "type" => "wrong");
        echo json_encode($status);
// if everything is ok, try to upload filed
    } else {
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            chmod($target_file, 0777);
            $status = array("status" => "สำเร็จ! ไฟล์ " . basename($_FILES["file_upload"]["name"]) . " ถูกอัพโหลดเรียบร้อย",
                "type" => "success");
            echo json_encode($status);


        } else {
            $status = array("status" => "ผิดพลาด! พบปัญหาในการอัพโหลดไฟล์",
                "type" => "wrong");
            echo json_encode($status);
            //header("Refresh:2; url=upload-file.php");

        }
    }
}


?>