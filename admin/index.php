<?php
    include "../db_conn.php";
    session_start();
    if(isset($_SESSION['uname'])){
        header("location:admin.php");
    }
    else{
?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container mt-5 pt-5">
            <div class = 'row m-auto'>
                <div class="col-lg-4 col-md-5 col-10 m-auto card">
                    <img class = "card-img mt-5" src = "logo.png"></img>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <?php
                                if(isset($_GET['error'])){

                            ?>
                                 <div class = "text-danger"> <?php echo($_GET['error']); ?></div>
                            <?php
                                }

                            ?>
                            <div class="form-floating">
                                <input type="text" name = 'uname' id = "uname" class = "form-control" placeholder="Username"/>
                                <label for="uname" class = "form-label">Username</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input type="password" name = 'pwd' id = "pwd" class = "form-control" placeholder="Password"/>
                                <label for="pwd" class = "form-label">Password</label>
                            </div>
                            <div class = " d-flex justify-content-center">
                                <input type="submit" class = "btn btn-success mt-4 justify-content-center text-center" value="Login">
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        
    </body>

</html>

<?php
    }

    ?>