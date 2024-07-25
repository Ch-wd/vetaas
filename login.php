<?php
    session_start();
    include "../db_conn.php";

    if($conn == FALSE){
        echo error;
    }

    if (isset($_POST['uname'])&& isset($_POST['pwd'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        }

        $uname = validate($_POST['uname']);
        $pwd = validate($_POST['pwd']);

        if(empty($uname) || empty ($pwd)){
            header("Location: index.php?error= Username or password cannot be empty");
        }

        $sql = "SELECT * from USERS WHERE uname = '$uname' AND pwd = '$pwd'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            // echo($row);
            if($row['uname']=== $uname  && $row['pwd'] === $pwd){
                echo "Logged in";
                $_SESSION['uname'] = $uname;
                header("location: admin.php");
                exit();
            }
            else{
                header("location: index.php?error= Invalid username or password");
            }
        }
        else{
            header("location: index.php?error= Invalid username or password"); 
        }
    }
    else{
        header("location: index.php?error= Invalid username or password");
    }


?>