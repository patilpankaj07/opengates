<?php
 require_once "config.php";

 $username = $password = $confirm_password ="";
 $username_err = $password_err = $confirm_password_err ="";

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){

   // check if username is empty
   if(empty(trim($_POST["username"]))){
      $username_err ="Username Cannot be blank";
   }
   else{
     $sql ="SELECT id FROM users WHERE username =?";
     $stmt = mysqli_prepare($conn, $sql);
     if($stmt){
       mysqli_stmt_bind_param($stmt, "s",$param_username);

       //set the value of param username
       $param_username = trim($_POST['username']);

       //try to execute this statement
       if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1)
         {
           $username_err ="This username is already taken";

         }
         else{
           $username = trim($_POST['username']);
         }
       }
       else{
         echo "Something went wrong";
       }
     }
     mysqli_stmt_close($stmt);
   }
   

 //check for password
 if(empty(trim($_POST['password']))){
   $password_err = "Password cannot be blank";
 }
 elseif(strlen(trim($_POST['password'])) < 4){
   $password_err = "Password cannot be less than 4 characters";
 }
 else{
   $password = trim($_POST['password']);
 }

 //check for confirm
 /*if(trim($_POST['password']) != trim($_POST['confirm_password'])){
   $password_err = "Password should match";
 }*/

 //if there were no errors, go ahead and insert into the database
 if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
 {
   $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
   $stmt = mysqli_prepare($conn, $sql);
   if($stmt)
   {
     mysqli_stmt_bind_param($stmt, "ss",
     $param_username, $param_password);

     // Set these parameters
     $param_username = $username;
     $param_password = password_hash($password,PASSWORD_DEFAULT);

     //Try to execute the query
     if (mysqli_stmt_execute($stmt))
     {
       header("location: login.php");
     }
     else{
       echo "Something went wrong... cannot redirect!";
     }
   }
   mysqli_stmt_close($stmt);
 }
 mysqli_close($conn);
 }

/*include 'partials/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = 'INSERT INTO `loginform` (`username`, `password`) VALUES ("'.$username.'", "'.$password.'")';
  $result = mysqli_query($conn, $sql);
  if($result){
    echo "<script>alert('Registration Successful')</script>";
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

    <title>REGISTER</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Opengates Login System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Acadmics</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3>Please Register Here  </h3>
  <hr>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" name = "username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name ="password" id="exampleInputPassword1" placeholder="Enter Password of at least 5 characters">
  </div>
  
  
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
</form>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>