<?php
    include 'db.inc.php';
    if(isset($_POST['login-button'])){
        //declare the variables
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        //check for empty fields
        if(empty($username)|| empty($pwd)){
            header("Location: ../login.php?error=emptyfield");
            exit();         
        }else{
            //check if the user is logged in
            $db = new DBManager();
            //create the connection 
            $conn = $db->createConnection();
            //LogIn the user
            $db->logInUser($conn,$username,$pwd);
        }
    }else{
        header("Location: ../login.php?error=loginfailed");
        exit();
    }