<?php
    require "header.inc.php";
?>
<main>
    <?php
        if(isset($_SESSION['username'])){
            header("Location: /dashboard.php");
            exit();
        }
        $invalidEmail = "emailinvalid";//username and role
        $invalidUser = "usernameInvalid";//role and email
        $InvalidRole = "roleInvalid";//username and email
        $passStrength = "passwordstrength";//username role and email
        $passMatch = "passwordmatch";//username role and email
        $spacedUser = "spacedUser";//username role and email
        $emptyfield = "emptyfields";//username role and email
        $username="";$role="";$email="";$message="";
        //get the data 
        if(isset($_GET['error'])){
            $errorType = $_GET['error'];
            switch ($errorType) {
                case $invalidEmail:
                    $username=$_GET['name'];
                    $role=$_GET['role'];
                    $message="Email: use the right format";
                    break;
                case $invalidUser:
                    $email=$_GET['email'];
                    $role=$_GET['role'];
                    $message = "Username: should not have special characters";
                    break;
                case $InvalidRole:
                    $username=$_GET['name'];
                    $email=$_GET['email'];
                    $message="Occupation: should not have special characters";
                    break;
                case $passStrength:
                    $username=$_GET['name'];
                    $role=$_GET['role'];
                    $email = $_GET['email'];
                    $message="increase password strength";
                    break;
                case $passMatch:
                    $username=$_GET['name'];
                    $role=$_GET['role'];
                    $email = $_GET['email'];
                    $message = "password should match";
                    break;        
                case $spacedUser:
                    $username=$_GET['name'];
                    $role=$_GET['role'];
                    $email = $_GET['email'];
                    $message = "username:don't use space ";
                    break;   
                case $emptyfield:
                    $username=$_GET['name'];
                    $role=$_GET['role'];
                    $email = $_GET['email'];
                    $message="fill all fields";
                    break;       
                default:
                    $username="";
                    $role="";
                    $email="";
                    $message="";
                    break;
            }
        }
    ?>
    <div class="form-input">
        <h4>GAMMER</h4>
        <form action="include/signup.inc.php" method="post">
            <input class="sign-input" type="text" name="username" placeholder="Username" value=<?php echo $username?>>
            <input class="sign-input" type="text" name="role" placeholder="Occupation" value=<?php echo $role?>>
            <input class="sign-input" type="email" name="email" placeholder="Email address" value=<?php echo $email?>>
            <input class="sign-input" type="password" name="pwd" placeholder="Password" >
            <input class="sign-input" type="password" name="pwd-repeat" placeholder="Confirm Password">
            <button class="sign-butt" name="sign-button" type="submit">Sign Up</button>
        </form>
        <p class="error-message"><?php echo $message;?></p>
    </div>
</main>
<?php require "footer.inc.php"?>

