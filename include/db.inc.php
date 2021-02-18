<?php
class DBManager{
  private $server = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "gammer";
  // private $create_sql = "CREATE TABLE users(
  //   id INT(11) AUTO_INCREMENT PRIMARY KEY,
  //   user_name VARCHAR(100) NOT NULL UNIQUE,
  //   user_role VARCHAR(100) NOT NULL,
  //   user_email VARCHAR(100) UNIQUE NOT NULL,
  //   user_pwd TEXT NOT NULL,
  //  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  //  )";
  private $insert_sql = "INSERT INTO users(user_name,user_role,user_email,user_pwd) VALUES(?,?,?,?);";
  private $select_username_sql = "SELECT * FROM users WHERE user_name=?";
  private $select_username_sql_logIn = "SELECT user_pwd,user_role FROM users WHERE user_name=?";
  private $select_user_email_sql = "SELECT * FROM users WHERE user_email=?";

  public function createConnection()
  {
    $conn = new mysqli($this->server, $this->username, $this->password, $this->database); 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return null;
      }
    return $conn;
  }

  public function saveToDB($conn,$username,$role,$email,$password)
  {
    $stmt = $conn->prepare($this->insert_sql);
    if(!$stmt){//check if the preparation failed
        header('Location: ../signup.php?saveToDB=sqlpreparefailed');
        exit();
    }
    //bind the statement
    //$hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param('ssss',$username,$role,$email,$password);
    //execute the statement
    if(!$stmt->execute()){//if the excution failed 
        $stmt->close();
        $conn->close(); 
        header("Location: ../signup.php?error=excecutionfailed");      
        exit();
    }else{
        $stmt->close();
        $conn->close();
        header("Location: ../login.php?registration=success");
        exit();
    } 
  }

  public function testUsername($conn,$username)
  {
    $stmt = $conn->prepare($this->select_username_sql);
    if(!$stmt){
      header("Location: ../signup.php?testUsername=sqlpreparefailed");
      exit();
    }
    //bind the the value to the query
    $stmt->bind_param('s',$username);
    //query
    $stmt->execute();
    //store the results
    $stmt->store_result();
    $resultCheck = $stmt->num_rows();
    if($resultCheck>0){
      $stmt->close();
      $conn->close();
      header("Location: ../signup.php?error=usernameexists");
      exit();
    }
  }

  public function testEmail($conn,$email)
  {
    $stmt = $conn->prepare($this->select_user_email_sql);
    if(!$stmt){
      header("Location: ../signup.php?testEmail=sqlpreparefailed");
      exit();
    }
    //bind the the value to the query
    $stmt->bind_param('s',$email);
    //query
    $stmt->execute();
    //store the results
    $stmt->store_result();
    $resultCheck = $stmt->num_rows();
    if($resultCheck>0){
      //if the email exist redirect
      $stmt->close();
      $conn->close();
      header("Location: ../signup.php?error=emailexists");
      exit();
    }
  }

  public function logInUser($conn,$username,$password)
  {
    $pwd = "";
    $role = "";
    $stmt = $conn->prepare($this->select_username_sql_logIn);
    if(!$stmt){
      header("Location: ../login.php?error=sqlpreparefailed");
      exit();
    }
    //bind the the value to the query
    //hash the password
    $stmt->bind_param('s',$username);
    //query
    $stmt->execute();
    //store the results
    $stmt->store_result();
    $resultCheck = $stmt->num_rows();
    if($resultCheck>0){
      //if the email exist redirect
      //confirm if the password matches
      $stmt->bind_result($pwd,$role);
      //part from bind you can use get_result 
      //then assign the result to a variable
      //the variable can fetch the assoc or object
      while($stmt->fetch()){
        if(strcmp($pwd,$password) != 0 ){
          //if the passwords do not match
          $stmt->free_result();
          $stmt->close();
          $conn->close();
          header("Location: ../login.php?error=userpassword&name=".$username);
          exit();
        }else if(strcmp($pwd,$password) == 0){
          //if the passwords match 
          session_start();
          $_SESSION['username'] = $username; 
          $_SESSION['user_role'] = $role; 
          //free the statement
          $stmt->free_result();
          $stmt->close();
          $conn->close();
          header("Location: ../dashboard.php?access=granted");
          exit();
        }
      }
    }else{
      //if the email does not exist redirect

      header("Location: ../login.php?error=userpassword&name=".$username);
      exit();
    }
  }
}