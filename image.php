<?php
    include "../db_conn.php";
    session_start();
    if(isset($_SESSION['uname'])){
        $target_dir = "../assets/blog/";
        $string = str_replace(' ','',basename($_FILES["upload"]["name"])); 
        $target_file = $target_dir.$string;
        $target_dir = "./assets/blog/";
        $upload_file = $target_dir.$string;
        if(move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file)){
            $response = [
                'url' => $upload_file
            ];
        }
        else{
            $response = [
                'url' => FALSE
            ];
        }
        echo json_encode($response);
    }
    else{
        header("location:index.php?error= please login");
    }
?>