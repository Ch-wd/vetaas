<?php
    session_start();
    include "../db_conn.php";

    if($conn == FALSE){
        echo error;
    }
 
    else{

        if(isset( $_SESSION['uname']))
        {
            if(isset ($_POST['teachers']) &&  isset($_POST['parents']) && isset($_POST['children'])){
                $query = "UPDATE impact SET parents = ".$_POST['parents'].", teachers = ".$_POST['teachers'].", children = ".$_POST['children']." WHERE id = 1";
                $sql = mysqli_query($conn,$query);
                echo $query;
                echo $sql;
                if($sql==FALSE){
                    header("location: impact.php?error= unable to update");
                }
                else{
                    header("location: impact.php?error= fields updated successfuly");
                }
            }
            else{
                header("location: impact.php?error= fields cannot be empty");
            }
        }
        else{
            header("location: index.php?error= Invalid username or password");
        }
    }


?>