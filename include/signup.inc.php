<?php
    include "db.inc.php";
    if(isset($_POST['sign-button'])){
        //check for empty inputs
        $username = $_POST['username'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $r_pwd = $_POST['pwd-repeat'];
        if(empty($username) || empty($role) || empty($email) || empty($pwd) || empty($r_pwd)){
            header("Location: ../signup.php?error=emptyfields&name=" . $username . "&role=" . $role . "&email=" . $email);
            exit();
        }else{
            //verify the email address
            if(!filter_var($email,FILTER_DEFAULT)){
                header("Location: ../signup.php?error=emailinvalid&name=".$username."&role=".$role);
                exit();
            }else{
                //username only letter and numbers
                if(!ctype_alnum(trim($username))){
                    header("Location: ../signup.php?error=usernameInvalid&role=".$role."&email=".$email);
                    exit();               
                }else{
                    //check for password length
                    if(!strlen(trim($pwd))>0){
                        header("Location: ../signup.php?error=passwordstrength&name=".$username."&role=".$role."&email=".$email);
                        exit();                         
                    }else{
                        //check if the confirm password and password do match
                        if($pwd != $r_pwd){
                            header("Location: ../signup.php?error=passwordmatch&name=".$username."&role=".$role."&email=".$email);
                            exit();                     
                        }else{
                            //check for special characters in role
                            if (!ctype_alnum($role)) {
                                header("Location: ../signup.php?error=roleInvalid&name=" . $username . "&email=" . $email);
                                exit();
                            }else{
                                //check for spaced words
                                if(count(explode(" ",$username))>1){
                                    header("Location: ../signup.php?error=spacedUser&name=" . $username . "&role=" . $role . "&email=" . $email);
                                    exit();            
                                }else{
                                    //final stage
                                    //$hashed_pwd = password_hash($pwd,PASSWORD_DEFAULT);
                                    $db = new DBManager();
                                    $conn = $db->createConnection();
                                    if($conn == null){
                                        header("Location: ../signup.php?error=connection");
                                        exit();
                                    }else{
                                        //checks if the username exists
                                        $db->testUsername($conn,$username);
                                        //checks if the email exists
                                        $db->testEmail($conn,$email);
                                        //if the data does not exists save
                                        $db->saveToDB($conn,$username,$role,$email,$pwd);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }else {
        header("Location: ../signup.php?error=signup");
        exit();
    }
