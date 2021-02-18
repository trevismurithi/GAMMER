<?php 
    session_start();
    $username = "";
    $role = "";
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $role = $_SESSION['user_role'];
    }else{
        $username="";
        $role = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/about.css">
    <link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/ninja.png" type="image/x-icon">
    <title>GAMMER</title>
</head>
<body>
    <nav class="header">
        <div class="brand">
            <img src="img/ninja.png" height="40px" width="40px" alt="wolf logo">
            <div class="line"></div>
            <h5>Gammer</h5>
        </div>

        <div class="logIn">
            <li class="link-http"><a href="index.php">Home</a></li class="link-http">
            <li class="link-http"><a href="about.php">About</a></li class="link-http">
            <li class="link-http"><a href="contact.php">Contact us</a></li class="link-http">
            <?php
                if($username){
                    $username = $_SESSION['username'];
                    echo'<li class="link-http"><a href="dashboard.php">Dashboard</a></li class="link-http">';
                    echo'<li class="link-http"><a>'.$username.'</a></li class="link-http">';
                    echo'<li class="link-http">
                            <form action="include/user.inc.php" method="post">
                                <button class="sign-butt" name="logout" type="submit">logout</button>
                            </form></li class="link-http">';
                }else{
                    echo '
                        <li class="link-http"><a href="signup.php">Sign Up</a></li class="link-http">
                        <li class="link-http"><a href="login.php">LogIn</a></li class="link-http">
                    ';
                }
            ?>
        </div>
    </nav>