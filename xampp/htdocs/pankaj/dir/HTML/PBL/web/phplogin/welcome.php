<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
 
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>WELCOME</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1>OPENGATES</h1></a>
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
      
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
          <a class="nav-link " href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEdUlEQVRoge1YTUxcVRT+zhsGOoWWElqIVmBqpYBkStopGErrMDCpGW0ZLKmhMVYXRE10ozubtBIXxlWTLkyoVRddWG2Txib2J4GBtgNtodKiEUFC3Bj86c8QmWEe88M7LupowRnem3tf0pjyLd893znf99695548YBnLeLRBZiarr6+32Wy2ViJqY+ZqACUAcpPriqK4e3p6LplZM8usRG63u42IjgAoZeaUMfPz8+8DMNWAKV+gubn5A2Y+ZDB8gpm/VhTliN/v/0O2trQBt9v9HhF9KEANMfNrfX19Z2TqSxloamqqAzAA8a04T0Rev9/fLapBESX+jY8gd44szPyp0+m0iiYQNuDxeLYAcBuJLStK4IAnhM/euY0DntDi5dL8/PxWUR3Cb0/TNN9S62VFCbg2q2jcrKKsKPHPc3txCDlWxvELqx8M9wI4LaJD2AAzu4gWHqGkaJdDhb04kYYJtLvCiMYJJ3pWAQCIyCGqQ2b/bgTSv2k9vOr590sw8zpREcIGiGgtAHz+7m3RFGh3hZNbSdiATBeySXAXY6UoUbaNPnQIGQj2Vr1QsyE6Z5aIrU/NqUH/Jq8IV+gMMHPXwf3BFV9eWtAK0XU8DCLgjY68lLxU63sbwmhvDNmY6BiA0ky1CG8hhRhvt/y54Nn9rpp+Okm1/taeGRBST69GIDQLBf2bvAzlk4I8rCeSHgi1YJinoOH1Qs9PFzMlSxXnocpxABUyOUA0RrVjT4vSJbsQB+T4ADS+IkOXM0DKV1J8AACfkpIgXf5GZS/Y2FSaApepbrxRpr4JF5nWAeCuADEIi6VDtrq0Aaqd+BmgNhCmM6AFwUorOUcnpevLJkiCr1eVxxORCWv20iNSPK7CuiKv3AzxgMn/he59Y2Vr9kpk5+QiK9sGhSwAAI3nkYipiM2FEY+rKNwdN62uaf+FkojHIojHImanTYtHcxp9EK2BWWfJ4e4buR0nYyNBe1QvfiRoj+Z2nIyVHOoeark8u0W2vrABXyDyjC+g9jOUb1njbZFQ2HpweL9Fj3f41kuWSChsBVBLinLTF1CvtPTPbhPVkbEB73nOaQmoxwC6BqABAOyOCoCAod9Lso6O7krLPTq6C1d/tWeBALujMvl4J7Ey6AtEPt43ytmZ6smoG7RcDxdT3HIGwPbFaz8ODGPy1hgA4PmS7/BmVS+qC6YAAKPT69E11oTzv9QAAMq3VqNq+393DwP9OZzYe/rZVXdMN/Di4EyhFrMOIN30ycD44Agmh3+Alma8VxSg3OlARV3NUpXHEog2nNu5xtDFaMwAM/n65y4AeE4vdObeNMLf9+Hu1G+4M3v/UluXq2LtE48jz+HG6sI1RlSdO7vDttuINEMGWgPqKwycMBJrGggvn91h+0IvTPcQ7zvFFg3oNEeVcRCjs5NZV59uQOyxqJuAJ82RZRwMlN8cmHPpxRloo9oeMwSJQGFe8gcyYMQAU60pagTAIN0LTt8AYYMpasSwUS/AyE1cYIIQUTzM2stYxv8CfwGB1GkEqVQ9lQAAAABJRU5ErkJggg=="><?php echo "Welcome ". $_SESSION['username']?></a>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3>WELCOME TO OPENGATES- You can now use this website</h3>
  <hr>
  <a href="web.php"><button type="button" class="btn btn-info">Info</button>
</a>
  




</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>