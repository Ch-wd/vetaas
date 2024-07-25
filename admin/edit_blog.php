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
        <div class = "container-fluid p-5 text-center">
        <div class = "red-title">List of all blogs</div>
            <table>
                <?php
                    if(isset($_GET['error'])){

                ?>
                        <div class = "text-danger"> <?php echo($_GET['error']); ?></div>
                <?php
                    }

                ?>
                <tr>
                    <th>Blog name</th>
                    <th>Date added</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                    <?php 
                    $query = "SELECT * from blog";
                    $result = mysqli_query($conn, $query);
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>$row[blogName]</td>";
                        echo "<td>$row[dateAdded]</td>";
                    ?>
                    <td><form action ="blog_db.php" method = "post">
                        <input type = "hidden" name = "function" value = "edit">
                        <input type = "hidden" name = "blogId" value = <?php echo "$row[blogId]"; ?>>
                        <input type = "submit" value="edit">
                    </form></td>
                    <td><form action ="blog_db.php" method = "post">
                        <input type = "hidden" name = "function" value = "delete">
                        <input type = "hidden" name = "blogId" value = <?php echo "$row[blogId]"; ?>>
                        <input type = "submit" value = "delete">
                    </form></td>
                    <?php
                        echo "</tr>";
                    }
    
                    ?>
    
            </table>
        </div>


        </div>

    </body>
</html>

<?php
    }
    else{
        header("location: index.html");
    }

?>
