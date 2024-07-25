<?php
    include "../db_conn.php";
    session_start();
    if(isset($_SESSION['uname'])){
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vetaas Education Foundation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href= "../style.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    </head>

    <body>
        <?php
        if($_POST['function']==='edit'){
            echo "edit";
        }
        if($_POST['function']==='delete'){
            $query = "DELETE FROM blog WHERE blogId=".$_POST['blogId'];
            $result = mysqli_query($conn, $query);
            if($result == FALSE){
                echo "unable to delete";
            }
            else{
                header("location:edit_blog.php?error=blog deleted successfully");
            }
        }
        if($_POST['function'] === 'add'){
            // $htmlcode = htmlspecialchars($_POST['editor']);
            $query = "INSERT INTO blog (blogName, dateAdded, blogContent,author) VALUES ('".$_POST['blogName']."','".date("Y-m-d")."','".$_POST['editor']."','".$_POST['author']."')";
            $result = mysqli_query($conn, $query);
            if($result == FALSE){
                echo htmlspecialchars($query);
            }
            else{
                header("location:../new_blog.php?error=blog added successfully");
            }
        }
        ?>
        </body>
        <?php

    }
    else{
        header("Location: index.php?error= Username or password cannot be empty");
    }
?>
