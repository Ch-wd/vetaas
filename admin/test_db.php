<?php
    include "../db_conn.php";
    session_start();
    if(isset($_SESSION['uname'])){
        if($_POST['function']==='edit'){
            echo "edit";
        }
        if($_POST['function']==='delete'){
            $query = "DELETE FROM testimonials WHERE id=".$_POST['testId'];
            $result = mysqli_query($conn, $query);
            if($result == FALSE){
                echo "unable to delete";
            }
            else{
                header("location:testimonials.php?error=testimonial deleted successfully");
            }
        }
        if($_POST['function'] === 'add'){
            $target_dir = "../assets/";
            $string = str_replace(' ','',basename($_FILES["fileToUpload"]["name"])); 
            $target_file = $target_dir.$string;
            $target_dir = "./assets/";
            $uploadFileName = $target_dir.$string;
            $uploadOk = 1;
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
                $query = "INSERT INTO testimonials (name, role, content, image)
                VALUES ('".$_POST['testName']."','".$_POST['testRole']."','".$_POST['content']."','".$uploadFileName."')";   
            }
            else{
                $query = "INSERT INTO testimonials (name, role, content)
                VALUES ('".$_POST['testName']."','".$_POST['testRole']."','".$_POST['content']."')";                
            }
            $result = mysqli_query($conn, $query);
            if($result == FALSE){
                echo "unable to add";
            }
            else{
                header("location:new_testimonials.php?error=testimonial added successfully");
            }
        }
    }
    else{
        header("Location: index.php?error= Username or password cannot be empty");
    }
?>
