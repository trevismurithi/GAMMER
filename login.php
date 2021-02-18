<?php require "header.inc.php"?>
<main>
<?php
if(isset($_SESSION['username'])){
    header("Location: /dashboard.php");
    exit();
}
$nonExistent = "userpassword"; //username
$passMatch = "userpassword"; //username 
$emptyfield = "emptyfield"; //username 
$message = "";
$username = "";
//get the data
if (isset($_GET['error'])) {
    $errorType = $_GET['error'];
    switch ($errorType) {
        case $passMatch:
            $username = $_GET['name'];
            $message = "username or password incorrect";
            break;
        case $emptyfield:
            $message = "please fill the required fields";
            break;
        case $nonExistent:
            $message = "username or password incorrect";
            break;
        default:
            $username = "";
            break;
    }
}
?>
    <div class="form-input">
        <h4>GAMMER</h4>
        <form action="include/login.inc.php" method="post">
            <input class="sign-input" type="text" name="username" placeholder="username" value=<?php echo $username;?>>
            <input class="sign-input" type="password" name="pwd" placeholder="Password" >
            <button class="sign-butt" name="login-button" type="submit">Login</button>
        </form>
        <p class="error-message"><?php echo $message;?></p>
    </div>
</main>
<?php require "footer.inc.php"?>
