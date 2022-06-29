<?php
//this will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
  header("location: welcome.php");
  exit;

}
require_once "config.php";

$username = $password ="";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
  {
    $err = "Please enter username + password";
  }
  else{
    $password = trim($_POST['password']);
    $username = trim($_POST['username']);
  }

  if(empty($err))
  {
    $sql = "SELECT id, username, password FROM users WHERE username =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    //try to execute this statement
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1)
         {
           mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
           if(mysqli_stmt_fetch($stmt))
           {
            if(password_verify($password, $hashed_password))
            {
              //this means the password is correct. allow user to login
              session_start();
              $_SESSION["username"] = $username;
              $_SESSION["id"] =$id; 
              $_SESSION["loggedin"] = true;

              //Redirect user to welcome page
              header("location: welcome.php");
              
            }
           }


         }
    
    }
    
  }

}







/*include 'partials/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // $sql = "INSERT INTO `loginform` ( `User`, `Email`, `Pass`) VALUES ( $Username, $email, $pass)";
    $sql = "Select * from loginform where username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        header("location: welcome.php");
    }
    else{
        echo "<script>alert('Incorrect Combination !')</script>";
    }

}*/
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>LOGIN</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Login System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="register.php">Register</a>
        </li> 
       
        <li class="nav-item active">
          <a class="nav-link " href="login.php">Login</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link " href="logout.php">Logout</a>
        </li>
        
      </ul>
      
      
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3>Please login Here  </h3>
  <hr>
  <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
    placeholder="Enter Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>




</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>