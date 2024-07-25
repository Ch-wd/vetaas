<?php
    include "../db_conn.php";
    session_start();
    if(isset($_SESSION['uname'])){
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href= "../style.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">    
    </head>
    <body>  
        <div class="whole-container">
            <nav class="navbar navbar-expand-md">
                <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img class ="img-fluid "  src = "../assets/logo.png"/></a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav container-fluid justify-content-end">
                    <li class="nav-item dropdown p-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Blog
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../new_blog.php">New blog</a></li>
                        <li><a class="dropdown-item" href="edit_blog.php">Modify</a></li>
                        </ul>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="impact.php">Impact number</a>
                    </li>
                    <li class="nav-item dropdown p-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Testimonials
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="new_testimonials.php">New testimonial</a></li>
                    <li><a class="dropdown-item" href="testimonials.php">Modify</a></li>
                    </ul>
                  </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="logout.php">logout</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
            <div class = "form-container">
                <?php 
                $query = "SELECT * from impact";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_assoc($result);

                ?>

                <form action = "change_impact.php" method="post">
                    <?php
                        if(isset($_GET['error'])){

                    ?>
                            <div class = "text-danger"> <?php echo($_GET['error']); ?></div>
                    <?php
                        }

                    ?>
                    <div class = "form-floating col-12 mt-3">
                        <input type ="number" id = "parents" name = "parents" class = "form-control" value =<?php echo $row['parents'] ?>  >
                        <label for = "parents" class = "form-label">Parents</label>
                    </div>
                    <div class = "form-floating col-12 mt-3">
                        <input type ="number" class = "form-control" name = "teachers" id = "teachers" value =<?php echo $row['teachers'] ?>  >
                        <label class = "form-label" for = "teachers">Teachers</label>
                    </div>
                    <div class = "form-floating col-12 mt-3">
                        <input type ="number" class = "form-control" name = "children" value =<?php echo $row['children'] ?>  >
                        <label class = "form-label" for = "children">Children</label>
                    </div>
                    <input class = "btn btn-success mt-4 justify-content-center text-center" type = "submit">
                </form> 
            </div>
        </div>
    </body>

</html>

<?php

    }
    else{
        echo "error";
    }
?>