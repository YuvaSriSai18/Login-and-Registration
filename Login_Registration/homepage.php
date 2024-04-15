<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Logout logic
if (isset($_GET["logout"])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Aggregator</title>
    <!-- Bootstrap CDN links  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Google Icons  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <!-- Nav Bar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid nav-bar">
            <a class="navbar-brand Logo" href="#" onclick="fetchData('all').then(data => renderMain(data))">News Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-bar-list-items" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="fetchData('all').then(data => renderMain(data))">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"  onclick="fetchData('Sports').then(data => renderMain(data))">Sports</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#"  onclick="fetchData('Politics').then(data => renderMain(data))">Politics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"  onclick="fetchData('Technology').then(data => renderMain(data))">Technology</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"  onclick="fetchData('Entertainment').then(data => renderMain(data))">Entertainment</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"  onclick="fetchData('Education').then(data => renderMain(data))">Education</a>
                    </li> -->
                
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" id="search" type="search" placeholder="Search">

                    <input class="btn btn-outline-success" type="submit" value="Search" onclick="()=>{
                        let search = document.getElementById('search').value ;
                        fetchData(search).then(data => renderMain(data));
                    }">
                    <button name="logout" onclick="logout()" style="border: 0;background-color:transparent;margin:0px 3px 0px 10px;" ><span class='material-symbols-rounded' style="font-size: 25px;" >logout</span></button>
                </form>
            </div>
        </div>
      </nav>
    <!--End of Nav Bar-->

    <!--Articles-->
    <main class="main">
            
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js">
        function logout() {
            console.log("Logging out...");
            window.location.href = 'login.php?logout=true';
        }
    </script>
  </body>
</html>